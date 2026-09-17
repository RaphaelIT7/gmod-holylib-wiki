<function name="SendFile" parent="CNetChan" type="classfunc">
	<description>
		Sends the given file to the other side of the channel.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">The path of the file to send</arg>
		<arg name="transferID" type="number">The transfer ID to use for this file transfer</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>
