<function name="Reconnect" parent="HolyLib" type="libraryfunc">
	<description>
		Reconnects the given player without him losing his slot
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">the player to reconnect</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">`true` if the client was successfully reconnected</ret>
	</rets>
</function>