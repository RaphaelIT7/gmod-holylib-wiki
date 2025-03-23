<function name="SetConnectionCrashedCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function for when a connection has crashed.<br>
		Can be returned using <page>CNetChan:GetConnectionCrashedCallback</page>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="channel" type="CNetChan">The channel</arg>
				<arg name="reason" type="string">The crash reason</arg>
			</callback>
		</arg>
	</args>
</function>