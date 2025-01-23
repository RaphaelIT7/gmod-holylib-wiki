<function name="HolyLib:OnSourceTVNetMessage" parent="" type="hook">
	<description>
		Called when a CHLTVClient sends a net message to the server.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="client" type="CHLTVClient">client that sent the net message</arg>
		<arg name="buffer" type="bf_read">the buffer containing the message content</arg>
	</args>
</function>

<example>
	<description></description>
	<code>
util.AddNetworkString("Example")
hook.Add("HolyLib:OnSourceTVNetMessage", "Example", function(client, bf)
	local name = util.NetworkIDToString(bf:ReadShort())) -- Reads the header
	print(name, bf:ReadString())
end)

---- Client

net.Start("Example")
	net.WriteString("Hello World from CHLTVClient");
net.SendToServer()
	</code>
	<output>
	</output>
</example>