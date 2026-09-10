<function name="WriteSeek" parent="net" type="libraryfunc">
	<description>
		Moves the write position of the currently active outgoing net message.<br>
		<warning>
			Can only be used while a net message is actively being written, meaning between `net.Start` and `net.SendToServer`/`net.Send`.
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="position" type="number">The bit position (relative to the start of the message's data) to seek to</arg>
	</args>
</function>