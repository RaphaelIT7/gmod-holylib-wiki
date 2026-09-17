<function name="SetServerCallback" parent="IGModAudioChannelEncoder" type="classfunc">
	<description>
		Sets the callback that is called whenever a client connects to or disconnects from the server set up by <page>IGModAudioChannelEncoder:ServerInit</page>.<br>
		<note>
			The callback is expected to return a boolean to allow/deny the connection, and optionally a string to send as extra HTTP headers when a client connects.<br>
			If no callback is set, all connections are allowed.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="connect" type="boolean">`true` if the client is connecting, `false` if it is disconnecting</arg>
				<arg name="client" type="string">The IP address (and port) of the client</arg>
			</callback>
		</arg>
	</args>
</function>
