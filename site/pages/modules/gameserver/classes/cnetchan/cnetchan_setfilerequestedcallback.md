<function name="SetFileRequestedCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function for when the other side of the channel requests a file for download.<br>
		Can be returned using <page>CNetChan:GetFileRequestedCallback</page>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="channel" type="CNetChan">The channel</arg>
				<arg name="fileName" type="string">The requested file's name</arg>
				<arg name="transferID" type="number">The transfer ID of the request</arg>
			</callback>
		</arg>
	</args>
</function>
