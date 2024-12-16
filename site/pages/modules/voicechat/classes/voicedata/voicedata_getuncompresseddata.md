<function name="GetUncompressedData" parent="VoiceData" type="classfunc">
	<description>
		Returns the uncompressed voice data.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="decompressSize" type="number" default="20000">The number of bytes to allocate for decompression. </arg>
	</args>
	<rets>
		<ret name="data" type="string">The uncompressed voice data.</ret>
	</rets>
</function>