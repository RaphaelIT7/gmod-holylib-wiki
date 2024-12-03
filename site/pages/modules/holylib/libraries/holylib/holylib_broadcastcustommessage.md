<function name="BroadcastCustomMessage" parent="HolyLib" type="libraryfunc">
	<description>
		Sends a custom net message to all clients.<br>
		This function allows you send any netmessage you want.<br>
		You should know what your doing since this function doesn't validate anything.<br>
		You can find all valid types in the <a href="https://github.com/RaphaelIT7/gmod-holylib/blob/main/source/sourcesdk/protocol.h#L86-L145">protocol.h</a>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="type" type="number"></arg>
		<arg name="name" type="string">name of broadcast message</arg>
		<arg name="buffer" type="bf_write">buffer</arg>
	</args>
</function>