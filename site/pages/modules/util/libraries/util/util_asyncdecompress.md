<function name="AsyncDecompress" parent="util" type="libraryfunc">
	<description>
		Decompresses the given data async.
		<warning>
			Instead of copying the given data, we keep a reference to it.<br>
			So don't modify it, while were decompressing it!
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="string">The data to decompress</arg>
		<arg name="callback" type="function">
			the callback that is called after we finished compressing it
			<callback>
				<arg name="data" type="string">The decompressed data</arg>
			</callback>
		</arg>
	</args>
</function>