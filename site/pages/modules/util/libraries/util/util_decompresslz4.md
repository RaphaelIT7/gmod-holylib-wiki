<function name="DecompressLZ4" parent="util" type="libraryfunc">
	<description>
		Decompresses the given data using [LZ4](https://github.com/lz4/lz4)  
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="string">The data to decompress</arg>
	</args>
	<rets>
		<ret name="decompressedData" type="string">The decompressed data</ret>
	</rets>
</function>