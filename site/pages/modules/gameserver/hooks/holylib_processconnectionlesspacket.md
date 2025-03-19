<function name="HolyLib:ProcessConnectionlessPacket" parent="" type="hook">
	<description>
		Called when a connectionless packet is received.
		<note>
			This hook is **not** called if it was disabled using <page>holylib_gameserver_connectionlesspackethook</page>
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="bf" type="bf_read">The received buffer</arg>
		<arg name="ip" type="string">the ipAddress & port of the sender</arg>
	</args>
	<rets>
		<ret name="handled" type="boolean" default="false">Return `true` to mark the packet as handled.</ret>
	</rets>
</function>

<example>
	<description>Retrieving the `A2S_INFO` from a Source Engine Server.</description>
	<code>
function AskForServerInfo(targetIP, challenge)
	local bf = bitbuf.CreateWriteBuffer(64)

	bf:WriteLong(-1) -- CONNECTIONLESS_HEADER
	bf:WriteByte(string.byte("T")) -- A2S_INFO Header
	bf:WriteString("Source Engine Query") -- Null terminated string

	if challenge then
		bf:WriteLong(challenge) -- Challange response if we got a S2C_CHALLENGE
	end

	gameserver.SendConnectionlessPacket(bf, targetIP)
end

function GetServerInfo(targetIP)
	AskForServerInfo(targetIP)

	hook.Add("HolyLib:ProcessConnectionlessPacket", "ProcessResponse", function(bf, ip)
		if ip != targetIP then return end

		local msgHeader = bf:ReadByte()
		if msgHeader == string.byte("A") then -- It responded with a S2C_CHALLENGE
			AskForServerInfo(targetIP, bf:ReadLong())
			return true
		end

		local a2s_info = {
			Header = msgHeader,
			Protocol = bf:ReadByte(),
			Name = bf:ReadString(),
			Map = bf:ReadString(),
			Folder = bf:ReadString(),
			Game = bf:ReadString(),
			ID = bf:ReadShort(),
			Players = bf:ReadByte(),
			MaxPlayers = bf:ReadByte(),
			Bots = bf:ReadByte(),
			ServerType = bf:ReadByte(),
			Environment = string.char(bf:ReadByte()),
			Visibility = bf:ReadByte(),
			VAC = bf:ReadByte(),
			Version = bf:ReadString(),
			ExtraDataFlag = bf:ReadByte(),
		}

		if bit.band(a2s_info.ExtraDataFlag, 0x80) != 0 then
			a2s_info.Port = bf:ReadShort()
		end

		if bit.band(a2s_info.ExtraDataFlag, 0x10) != 0 then
			a2s_info.SteamID = bf:ReadLongLong()
		end

		if bit.band(a2s_info.ExtraDataFlag, 0x40) != 0 then
			a2s_info.SourceTVPort = bf:ReadShort()
			a2s_info.SourceTVName = bf:ReadString()
		end

		if bit.band(a2s_info.ExtraDataFlag, 0x20) != 0 then
			a2s_info.Tags = bf:ReadString()
		end

		if bit.band(a2s_info.ExtraDataFlag, 0x01) != 0 then
			a2s_info.GameID = bf:ReadLongLong()
		end

		PrintTable(a2s_info)
	end)
end

--- Example call
GetServerInfo("xxx.xxx.xxx.xxx:27015")
	</code>
	<output>
["Bots"]        =       0
["Environment"] =       108
["Folder"]      =       garrysmod
["Game"]        =       Sandbox
["Header"]      =       73
["ID"]  =       4000
["Map"] =       gm_flatgrass
["MaxPlayers"]  =       128
["Name"]        =       RaphaelIT7's Testing Hell
["Players"]     =       0
["Protocol"]    =       17
["ServerType"]  =       100
["VAC"] =       1
["Visibility"]  =       1
	</output>
</example>

<example>
	<description>Retrieving the `A2S_PLAYER` from a Source Engine Server.</description>
	<code>
function AskForServerPlayerInfo(targetIP, challenge)
	local bf = bitbuf.CreateWriteBuffer(64)

	bf:WriteLong(-1) -- CONNECTIONLESS_HEADER
	bf:WriteByte(string.byte("U")) -- A2S_PLAYER Header

	bf:WriteUBitLong(challenge or -1, 32) -- Challange response if we got a S2C_CHALLENGE

	gameserver.SendConnectionlessPacket(bf, targetIP)
end

function GetServerPlayerInfo(targetIP)
	AskForServerPlayerInfo(targetIP)

	hook.Add("HolyLib:ProcessConnectionlessPacket", "ProcessResponse", function(bf, ip)
		if ip != targetIP then return end

		local msgHeader = bf:ReadByte()
		if msgHeader == string.byte("A") then -- It responded with a S2C_CHALLENGE
			AskForServerPlayerInfo(targetIP, bf:ReadUBitLong(32))
			return true
		end

		local a2s_player = {
			Header = string.char(msgHeader),
			Players = bf:ReadByte(),
		}

		for k=1, a2s_player.Players do
			local entry = {}
			a2s_player[k] = entry

			entry.Index = bf:ReadByte()
			entry.Name = bf:ReadString()
			entry.Score = bf:ReadLong()
			entry.Duration = bf:ReadFloat()
		end

		PrintTable(a2s_player)
	end)
end

--- Example call
GetServerPlayerInfo("xxx.xxx.xxx.xxx:27015")
	</code>
	<output>
[1]:
                ["Duration"]    =       40.337387084961
                ["Index"]       =       0
                ["Name"]        =       Raphael
                ["Score"]       =       0
["Header"]      =       D
["Players"]     =       1
	</output>
</example>