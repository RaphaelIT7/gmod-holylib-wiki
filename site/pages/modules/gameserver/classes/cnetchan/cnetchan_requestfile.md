<function name="RequestFile" parent="CNetChan" type="classfunc">
	<description>
		Requests the given file from the other side of the channel.<br>
		The result is reported through <page>CNetChan:SetFileReceivedCallback</page> (or <page>CNetChan:SetFileDeniedCallback</page> if the other side denies it), using the returned transfer ID.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">The path of the file to request</arg>
	</args>
	<rets>
		<ret name="transferID" type="number">The transfer ID assigned to this request</ret>
	</rets>
</function>
