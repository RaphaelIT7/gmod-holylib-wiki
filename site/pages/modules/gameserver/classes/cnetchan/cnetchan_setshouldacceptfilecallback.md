<function name="SetShouldAcceptFileCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function that decides whether an incoming file transfer request should be accepted.<br>
		If no callback is set, or the callback errors, the file is denied.<br>
		Can be returned using <page>CNetChan:GetShouldAcceptFileCallback</page>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="channel" type="CNetChan">The channel</arg>
				<arg name="fileName" type="string">The requested file's name</arg>
				<arg name="transferID" type="number">The transfer ID of the request</arg>
				<ret name="accept" type="boolean">Return `true` to accept the file, `false` to deny it</ret>
			</callback>
		</arg>
	</args>
</function>
