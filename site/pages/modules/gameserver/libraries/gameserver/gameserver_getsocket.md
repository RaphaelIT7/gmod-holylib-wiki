<function name="GetSocket" parent="gameserver" type="libraryfunc">
	<description>
		Returns the network socket index the server is listening on, usable with functions like <page>gameserver.SendConnectionlessPacket</page> or <page>gameserver.CreateNetChannel</page>.
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="socket" type="number">The socket index, see <page>gameserver.NS_SERVER</page></ret>
	</rets>
</function>