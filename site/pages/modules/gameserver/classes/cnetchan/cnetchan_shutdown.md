<function name="Shutdown" parent="CNetChan" type="classfunc">
	<description>
		Shuts down the channel.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="reason" type="string" default="nil">the reason to disconnect the channel with, if `nil` it will silently close without sending a disconnect message</arg>
	</args>
</function>