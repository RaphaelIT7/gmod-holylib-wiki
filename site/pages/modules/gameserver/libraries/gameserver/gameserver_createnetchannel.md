<function name="CreateNetChannel" parent="gameserver" type="libraryfunc">
	<description>
		Creates a net channel for the given ip.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ip" type="string">The IP of the target, format `ip:port`</arg>
		<arg name="useDNS" type="boolean">If `true` it will try to resolve the IP</arg>
	</args>
	<rets>
		<ret name="channel" type="CNetChan">Returns the channel or `nil` on failure</ret>
	</rets>
</function>

<example>
	<description>Example implementation of creating a working connection between two servers</description>
	<code>
local REQUEST_CHANNEL = string.byte("z")
function BuildNetChannel(target, status) -- status should not be set when called
	local bf = bitbuf.CreateWriteBuffer(64)

	bf:WriteLong(-1) -- CONNECTIONLESS_HEADER
	bf:WriteByte(REQUEST_CHANNEL) -- Our header
    bf:WriteByte(status or 0) -- 0 = We requested it.

	gameserver.SendConnectionlessPacket(bf, target)
end

function IncomingNetMessage(channel, bf, length)
	print("Received a message at " .. tostring(channel), bf, length)
end

netChannels = netChannels or {}
hook.Add("HolyLib:ProcessConnectionlessPacket", "ProcessResponse", function(bf, ip)
	local header = bf:ReadByte()
	if header != REQUEST_CHANNEL then return end

	local status = bf:ReadByte()

	local netChan = gameserver.CreateNetChannel(ip)
    netChan:SetMessageCallback(function(bf, length)
    	IncomingNetMessage(netChan, bf, length)
    end)
    table.insert(netChannels, netChan)

    if status == 0 then
    	print("Created a requested net channel to " .. ip)

    	BuildNetChannel(ip, 1) -- Respond to the sender to confirm creation.
    elseif status == 1 then
    	print("Created our net channel to " .. ip)
    end
    
	return true
end)

function SendNetMessage(target, bf, reliable)
	for _, netChan in ipairs(netChannels) do
		if not netChan:IsValid() then continue end
		if netChan:GetName() != target then continue end

		return netChan:SendMessage(bf, reliable)
	end

	return false
end

hook.Add("Think", "UpdateNetChannels", function()
	for _, netChan in ipairs(netChannels) do
		if not netChan:IsValid() then continue end

		netChan:ProcessStream() -- process any incomming messages
		netChan:Transmit() -- Transmit out a update.
	end
end)

-- Install the script on two servers.
-- call BuildNetChannel with the target on one of the servers and on both servers a net channel is created

BuildNetChannel("127.0.0.1:27015")
	</code>
</example>