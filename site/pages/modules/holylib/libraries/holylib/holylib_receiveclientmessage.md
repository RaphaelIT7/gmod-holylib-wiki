<function name="ReceiveClientMessage" parent="HolyLib" type="libraryfunc">
	<description>
		Feeds the given buffer into the engine as if it were a net message that was just received from the given client.<br>
		A direct engine bind to `IServerGameClients::GMOD_ReceiveClientMessage`
		<note>
			If the bitbuf module is disabled, it will throw a lua error!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="userid" type="number">userid of the client the message should appear to originate from</arg>
		<arg name="ent" type="Entity">the client's player entity</arg>
		<arg name="buffer" type="bf_read">the buffer containing the message to process</arg>
		<arg name="bits" type="number">number of bits in the buffer that should be read</arg>
	</args>
</function>
