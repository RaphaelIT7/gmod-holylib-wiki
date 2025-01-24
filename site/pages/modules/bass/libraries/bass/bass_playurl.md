<function name="PlayURL" parent="bass" type="libraryfunc">
	<description>
		Creates a IGMODAudioChannel using the given url.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="url" type="string">url to use</arg>
		<arg name="flags" type="string">Flags to use</arg>
		<arg name="callback" type="function">
			callback function with the created IGMODAudioChannel
			<callback>
				<arg name="channel" type="IGMODAudioChannel">The created channel. `nil` on error</arg>
				<arg name="errorCode" type="number">The error code</arg>
				<arg name="error" type="string">The error string</arg>
			</callback>
		</arg>
	</args>
</function>