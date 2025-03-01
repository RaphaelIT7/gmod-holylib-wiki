<function name="Disconnect" parent="CBaseClient" type="classfunc">
	<description>
		Disconnects the client.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="reason" type="string">the reason to disconnect the client with</arg>
		<arg name="silent" type="boolean" default="false">if `true` it will silently close the net channel and sends no disconnect to the client</arg>
		<arg name="nogameevent" type="boolean" default="false">if `true` it will stop the `player_disconnect` gameevent from being created</arg>
	</args>
</function>