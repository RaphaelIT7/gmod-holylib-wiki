<function name="SendCustomMessage" parent="HolyLib" type="libraryfunc">
	<description>
		Same as BroadcastCustomMessage but it only sends it to the specific player.
		You can find all valid types in the <a href="https://github.com/RaphaelIT7/gmod-holylib/blob/main/source/sourcesdk/protocol.h#L86-L145">protocol.h</a>.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="type" type="number">---</arg>
		<arg name="name" type="string">name of broadcast message</arg>
		<arg name="buffer" type="bf_write">buffer</arg>
		<arg name="ply / userID" type="Player / Number">player or userID to target</arg>
	</args>
</function>