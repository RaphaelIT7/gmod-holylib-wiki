<function name="WriteGameSounds" parent="CBaseClient" type="classfunc">
	<description>
		Writes the client's pending game sounds into the given buffer.
		<note>
			If the `bitbuf` module is disabled, it will throw a lua error!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="buffer" type="bf_write">the buffer to write the game sounds into</arg>
	</args>
</function>
