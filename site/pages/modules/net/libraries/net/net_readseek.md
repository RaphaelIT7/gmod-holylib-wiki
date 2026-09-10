<function name="ReadSeek" parent="net" type="libraryfunc">
	<description>
		Moves the read position of the currently active incoming net message.<br>
		<warning>
			Can only be used while a net message is actively being read, meaning inside a `net.Receive` callback.
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="position" type="number">The bit position (relative to the start of the message's data) to seek to</arg>
	</args>
</function>