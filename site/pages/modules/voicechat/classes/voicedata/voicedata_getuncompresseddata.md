<function name="GetUncompressedData" parent="VoiceData" type="classfunc">
	<description>
		Returns the uncompressed voice data.

		<changed version="0.8">
			The `decompressSize` was removed as it now uses an internal buffer to improve performance.
		</changed>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="data" type="string">The uncompressed voice data.</ret>
	</rets>
</function>