<function name="PlayFile" parent="bass" type="libraryfunc">
	<description>
		Creates a IGMODAudioChannel using the given file.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="filePath" type="string">Path to the file</arg>
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