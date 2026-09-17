<function name="SetPacketEndCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function that is called once all messages of an incoming packet have been parsed.<br>
		Can be returned using <page>CNetChan:GetPacketEndCallback</page>
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
