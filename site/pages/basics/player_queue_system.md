<title>Player Queue System</title>

## Player Queue
Using the `gameserver` module, you can create a player queue system.<br>

By default, HolyLib will stop any player from spawning if there is no player slot below 128 available.<br>
This is because any player slot above 128 is utterly unstable.<br>
to solve this, any player using a slot above 128 is moved into an empty slot that is below 128, if none is available they won't be allowed to spawn.<br>

## Example code

<code language="lua">
playerQueue = playerQueue or {
	count = 0
}

hook.Add("HolyLib:OnSetSignonState", "Example", function(cl, state, c)
	print(cl, state, c)

	local fullServer = #player.GetAll() >= 128 -- Can't exceed 128 players.
	if fullServer and state == SIGNONSTATE_PRESPAWN then -- REQUIRED to be SIGNONSTATE_PRESPAWN
		if not playerQueue[cl] then
			playerQueue[cl] = true
			playerQueue.count = playerQueue.count + 1
			playerQueue[playerQueue.count] = cl
		end

		return true -- Stop the engine from continuing/spawning the player
	end
end)

hook.Add("HolyLib:OnClientDisconnect", "Example", function(client)
	timer.Simple(0, function() -- Just to be sure that the client was really disconnected.
		if playerQueue.count <= 0 then return end

		if client:IsValid() then
			print("Client isn't empty?!? client: " .. client)
			return
		end

		local nextPlayer = playerQueue[1]
		playerQueue[nextPlayer] = nil
		table.remove(playerQueue, 1)
		playerQueue.count = playerQueue.count - 1

		nextPlayer:SpawnPlayer() -- Spawn the client, HolyLib handles the moving of the client.
	end)
end)

hook.Add("HolyLib:OnPlayerChangedSlot", "Example", function(oldPlayerSlot, newPlayerSlot)
	print("Client was moved from slot " .. oldPlayerSlot .. " to slot " .. newPlayerSlot)
end)
</code>