<function name="SetFileReceivedCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function for when a requested file has been fully received.<br>
		Can be returned using <page>CNetChan:GetFileReceivedCallback</page>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="channel" type="CNetChan">The channel</arg>
				<arg name="fileName" type="string">The received file's name</arg>
				<arg name="transferID" type="number">The transfer ID of the file</arg>
			</callback>
		</arg>
	</args>
</function>
