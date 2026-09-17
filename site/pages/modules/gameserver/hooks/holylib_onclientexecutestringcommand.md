<function name="HolyLib:OnClientExecuteStringCommand" parent="" type="hook">
	<description>
		Called before the engine executes a string command sent by a client, see <page>CBaseClient:ExecuteStringCommand</page>.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="client" type="CGameClient">The client that sent the command</arg>
		<arg name="command" type="string">The command string</arg>
	</args>
	<rets>
		<ret name="skip" type="boolean" default="false">Return `true` to stop the engine from executing the command.</ret>
	</rets>
</function>