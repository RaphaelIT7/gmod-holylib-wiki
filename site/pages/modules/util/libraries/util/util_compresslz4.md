<function name="CompressLZ4" parent="util" type="libraryfunc">
	<description>
		Compresses the given data using [LZ4](https://github.com/lz4/lz4)  
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="string">The data to compress</arg>
		<arg name="accelerationLevel" type="number" default="1">the acceleration level, a higher value means less faster compression yet lower compression ratios.</arg>
	</args>
</function>