<function name="IsDir" parent="filesystem" type="libraryfunc">
	<description>
		Checks if the give folder exists in the given path.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="folderName" type="string">folder to check existance</arg>
		<arg name="gamePath" type="string">game path to use</arg>
	</args>
	<rets>
		<ret name="exists" type="boolean">Returns `true` if the folder exists</ret>
	</rets>
</function>