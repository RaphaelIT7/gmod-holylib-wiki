<function name="AsyncCompress" parent="util" type="libraryfunc">
	<description>
		Compresses the given data async.
		<warning>
			Instead of copying the given data, we keep a reference to it.<br>
			So don't modify it, while were compressing it!
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="string">The data to compress</arg>
		<arg name="level" type="number" default="5">the level of compression</arg>
		<arg name="dictSize" type="number" default="65536">the dictionary size to use</arg>
		<arg name="callback" type="function">
			the callback that is called after we finished compressing it
			<callback>
				<arg name="data" type="string">The compressed data</arg>
			</callback>
		</arg>
	</args>
</function>

<example>
	<description>Showing the different argument overloads</description>
	<code>
util.AsyncCompress("Hello world", nil, nil, function(data)
	print(#data)
end)

util.AsyncCompress("Hello world", function(data)
	print(#data)
end)
	</code>
</example>