<function name="HolyLib:PreProcessVoiceChat" parent="" type="hook">
	<description>
		Called before the voicedata is processed.<br>
		Return `true` to stop the engine from processing it.<br>
		<note>
			After the hook the `VoiceData` becomes **invalid**, if you want to store it call `VoiceData:CreateCopy()` and use the returned VoiceData.
		</note>
		<changed version="0.7">
			The given voiceData becomes invalid after the hook, use <page>VoiceData:CreateCopy</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player that wants to listen to the events, can be `NULL` if it's called before a player spawned</arg>
		<arg name="voiceData" type="VoiceData">The Voice Data we received</arg>
	</args>
	<rets>
		<ret name="cancel" type="boolean">Return `true` to stop the engine from processing anything</ret>
	</rets>
</function>

<example>
	<description>Example to record, save and play back voices</description>
	<code>
voiceTbl = {}
concommand.Add("record_me", function()
	hook.Remove("Think", "VoiceChat_Example") -- Doesn't like to play back while recording :^
	voiceTbl = {}
	voiceStartTick=engine.TickCount()
	hook.Add("HolyLib:PreProcessVoiceChat", "VoiceChat_Example", function(ply, voiceData)
		if !voiceTbl[ply] then
			voiceTbl[ply] = {}
		end

		voiceTbl[ply][engine.TickCount() - voiceStartTick] = voiceData:CreateCopy()
		-- We save the tick delays since the voice data isn't sent every frame and has random delays.
	end)
end)

concommand.Add("stop_record", function()
	hook.Remove("HolyLib:PreProcessVoiceChat", "VoiceChat_Example")
end)

concommand.Add("play_me", function(ply)
	if !voiceTbl[ply] then
		ply:ChatPrint("You first need to record.")
		return
	end

	if !player.GetBots()[1] then
		RunConsoleCommand("bot")
	end

	hook.Remove("HolyLib:PreProcessVoiceChat", "VoiceChat_Example")

	voiceIdx = 0
	hook.Add("Think", "VoiceChat_Example", function()
		if !IsValid(ply) then
			hook.Remove("Think", "VoiceChat_Example")
			return
		end

		voiceIdx = voiceIdx + 1 
		local voiceData = voiceTbl[ply][voiceIdx]
		-- We play it back in the exact same tick delays we received it in to not speed it up affect it in any way.
		if voiceData then 
			voicechat.ProcessVoiceData(player.GetBots()[1], voiceData)
		end 
	end)
end)

-- VoiceStream examples

-- NOTE
--
-- A VoiceStream internally uses the format our "voiceTbl" already has, the key is a number/tick and the value is a VoiceData.
-- Because of this the VoiceStream:SetData / VoiceStream:GetData functions seamlessly with our code.

concommand.Add("save_record", function(ply)
	local voiceStream = voicechat.CreateVoiceStream()
	voiceStream:SetData(voiceTbl[ply] or {})

	voicechat.SaveVoiceStream(voiceStream, "voiceData_" .. ply:SteamID64() .. ".dat", "DATA")

	ply:ChatPrint("Saved the VoiceStream")
end)

concommand.Add("load_record", function(ply)
	local voiceStream, status = voicechat.LoadVoiceStream("voiceData_" .. ply:SteamID64() .. ".dat", "DATA")

	if voiceStream then
		voiceTbl[ply] = voiceStream:GetData()
		ply:ChatPrint("Loaded the VoiceStream")
	else
		ply:ChatPrint("Failed to load VoiceStream. You probably don't have a save.")
	end
end)

-- Async VoiceStream examples

concommand.Add("async_save_record", function(ply)
	local voiceStream = voicechat.CreateVoiceStream()
	voiceStream:SetData(voiceTbl[ply] or {})

	voicechat.SaveVoiceStream(voiceStream, "voiceData_" .. ply:SteamID64() .. ".dat", "DATA", async, function(voiceStream, status)
		if !IsValid(ply) then return end

		ply:ChatPrint("Saved the VoiceStream")
	end)
end)

concommand.Add("async_load_record", function(ply)
	voicechat.LoadVoiceStream("voiceData_" .. ply:SteamID64() .. ".dat", "DATA", true, function(voiceStream, status)
		if !IsValid(ply) then return end

		if voiceStream then
			voiceTbl[ply] = voiceStream:GetData()
			ply:ChatPrint("Loaded the VoiceStream")
		else
			ply:ChatPrint("Failed to load VoiceStream. You probably don't have a save.")
		end
	 end)
end)
	</code>
</example>

<example>
	<description>The Engine's voicechat but in Lua</description>
	<code>
hook.Add("HolyLib:PreProcessVoiceChat", "VoiceChat_Engine", function(pClient, voiceData)
	if GetConVar("voice_debugfeedbackfrom"):GetBool() then
		print(string.format("Sending voice from: %s - playerslot: %d", pClient:Name(), pClient:EntIndex()))
	end

	local iLength = voiceData:GetLength()
	for _, pDestClient in player.Iterator() do
		local bSelf = pDestClient == pClient
		local bHearsPlayer = voicechat.IsHearingClient(pDestClient, pClient)

		voiceData:SetProximity(voicechat.IsProximityHearingClient(pDestClient, pClient))

		if !bHearsPlayer && !bSelf then continue end

		voiceData:SetLength(iLength)

		if !bHearsPlayer then
			-- Still send something, just zero length (this is so the client
			-- can display something that shows that the server knows it's talking).
			voiceData:SetLength(0)
		end

		voicechat.SendVoiceData(pDestClient, voiceData)
	end

	return true -- Stop Engine handling since we fully handled it
end)
	</code>
</example>