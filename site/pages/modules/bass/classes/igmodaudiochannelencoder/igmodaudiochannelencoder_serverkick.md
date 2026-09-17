<function name="ServerKick" parent="IGModAudioChannelEncoder" type="classfunc">
	<description>
		Closes the connection of a client connected through <page>IGModAudioChannelEncoder:ServerInit</page>.<br>
		See https://www.un4seen.com/doc/#bassenc/BASS_Encode_ServerKick.html<br>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="client" type="string">The IP address (and optionally port) of the client to kick, or `*` to kick all clients</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>
