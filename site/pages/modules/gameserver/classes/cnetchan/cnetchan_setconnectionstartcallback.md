<function name="SetConnectionStartCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function for when the connection was established.<br>
		Can be returned using <page>CNetChan:GetConnectionStartCallback</page>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="channel" type="CNetChan">The channel</arg>
			</callback>
		</arg>
	</args>
</function>