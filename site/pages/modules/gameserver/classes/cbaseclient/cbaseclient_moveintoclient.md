<function name="MoveIntoClient" parent="CBaseClient" type="classfunc">
	<description>
		Moves this client's state into the given target client.
		<note>
			Throws an error if either client is a `HLTV` client.
		</note>
	</description>
	<unsafe version="0.8">
	<realm>Server</realm>
	<args>
		<arg name="target" type="CBaseClient">the client to move this client's state into</arg>
	</args>
</function>
