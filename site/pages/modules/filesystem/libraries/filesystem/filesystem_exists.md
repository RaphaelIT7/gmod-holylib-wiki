<function name="Exists" parent="filesystem" type="libraryfunc">
	<description>
		Checks if the give fileName exists in the given path.
		<note>
			This **doesn't** work with folders!
		</note>
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">file to check existance</arg>
		<arg name="gamePath" type="string">game path to use</arg>
	</args>
	<rets>
		<ret name="exists" type="boolean">Returns `true` if the file exists</ret>
	</rets>
</function>