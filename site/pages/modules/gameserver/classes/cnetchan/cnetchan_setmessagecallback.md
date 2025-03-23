<function name="SetMessageCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function for any incomming messages.<br>
		Can be returned using <page>CNetChan:GetMessageCallback</page>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="channel" type="CNetChan">The channel</arg>
				<arg name="buffer" type="bf_read">The received data</arg>
				<arg name="length" type="number">the length of the received data</arg>
			</callback>
		</arg>
	</args>
</function>