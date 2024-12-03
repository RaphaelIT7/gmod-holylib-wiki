<function name="SendCustomMessage" parent="HolyLib" type="libraryfunc">
	<description>
		Same as <page>holylib_broadcastcustommessage</page> but it only sends it to the specific player.<br>
		You can find all valid types in the <a href="https://github.com/RaphaelIT7/gmod-holylib/blob/main/source/sourcesdk/protocol.h#L86-L145">protocol.h</a>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="type" type="number"></arg>
		<arg name="name" type="string">name of broadcast message</arg>
		<arg name="buffer" type="bf_write">the message buffer</arg>
		<arg name="ply" type="Player">player to target. Can be a the userID(number) of a player</arg>
	</args>
</function>