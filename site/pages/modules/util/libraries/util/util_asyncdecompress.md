<function name="AsyncDecompress" parent="util" type="libraryfunc">
	<description>
		Decompresses the given data async.
		<warning>
			Instead of copying the given data, we keep a reference to it.<br>
			So don't modify it, while were decompressing it!
		</warning>
		<added version="0.3"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="string">The data to decompress</arg>
		<arg name="callback" type="function">
			the callback that is called after we finished compressing it
			<callback>
				<arg name="data" type="string">The decompressed data or `nil` on failure</arg>
			</callback>
		</arg>
		<arg name="ratio" type="number" default="0.98">
			The maximum allowed decompression ratio.<br>
			By default `0.98` allowing `0.2MB` to be decompressed to `10MB`.<br>
			Set to `1` to completely disable this limit<br>
			If the decompressed ratio exceeds this limit, the decompression will fail.<br>
			This was done as a security fix as received client compressed data with a ratio of `0.999` or something like that could be `16kb` compressed but could decompress to `100+MB`
		</arg>
	</args>
</function>