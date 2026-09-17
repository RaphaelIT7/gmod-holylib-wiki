<function name="SetFileSentCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function for when a file has been fully sent to the other side of the channel.<br>
		Can be returned using <page>CNetChan:GetFileSentCallback</page>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="channel" type="CNetChan">The channel</arg>
				<arg name="fileName" type="string">The sent file's name</arg>
				<arg name="transferID" type="number">The transfer ID of the file</arg>
			</callback>
		</arg>
	</args>
</function>
