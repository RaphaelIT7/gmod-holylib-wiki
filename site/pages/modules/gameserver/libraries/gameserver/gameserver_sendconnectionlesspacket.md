<function name="SendConnectionlessPacket" parent="gameserver" type="libraryfunc">
	<description>
		Sends out a connectionless packet to the target ip.<br>
		See <page>HolyLib:ProcessConnectionlessPacket</page> for examples.
		<note>
			It's expected that **YOU** already added the connectionless header, this was done to not have to copy the buffer.<br>
			`bf:WriteLong(-1) -- Write this as the first thing. This is the CONNECTIONLESS_HEADER`
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="bf" type="bf_write">The buffer to send</arg>
		<arg name="ip" type="string">The target to send the packet to. Format `ip:port`</arg>
		<arg name="useDNS" type="boolean">If `true` it will try to resolve the IP</arg>
		<arg name="socket" type="number" default="NS_SERVER">The socket to use for sending the packet.</arg>
	</args>
	<rets>
		<ret name="length" type="number">Returns the length of the sent data or `-1` on failure</ret>
	</rets>
</function>

<example>
	<description>Example on how to send a loopback packet</description>
	<code>
hook.Add("HolyLib:ProcessConnectionlessPacket", "LoopbackExample", function(bf, ip)
	if ip != "loopback" then return end

	print("We got our own packet: " .. bf:ReadString())
	return true
end)

local bf = bitbuf.CreateWriteBuffer(64)
bf:WriteLong(-1)
bf:WriteString("Hello World")

-- We use NS_CLIENT as a socket because then the packet is queued into the Server loopback queue.
gameserver.SendConnectionlessPacket(bf, "loopback:" .. gameserver.GetUDPPort(), false, gameserver.NS_CLIENT)
	</code>
</example>