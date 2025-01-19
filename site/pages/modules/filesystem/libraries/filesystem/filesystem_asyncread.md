<function name="AsyncRead" parent="filesystem" type="libraryfunc">
	<description>
		Reads a file async and calls the callback with the contents.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">file to read</arg>
		<arg name="gamePath" type="string">game path to use</arg>
		<arg name="callback" type="function">
			the callback that is called after the file was read
			<callback>
				<arg name="fileName" type="string">the provided `fileName`</arg>
				<arg name="gamePath" type="string">the provided `gamePath`</arg>
				<arg name="status" type="number">status of read operation. Returns a <page>FSASYNC</page> enum</arg>
				<arg name="content" type="string">the read content or `nil`</arg>
			</callback>
		</arg>
	</args>
	<rets>
		<ret name="status" type="FSASYNC">Returns <page name="FSASYNC_ERR">FSASYNC</page> if any issues occurred</ret>
	</rets>
</function>