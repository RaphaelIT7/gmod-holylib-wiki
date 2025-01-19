<function name="Size" parent="filesystem" type="libraryfunc">
	<description>
		Returns the size of the given file.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">the file to use</arg>
		<arg name="gamePath" type="string" default="GAME">game path to use</arg>
	</args>
	<rets>
		<ret name="size" type="number">Returns the file size or `0` on failure</ret>
	</rets>
</function>