<function name="Find" parent="filesystem" type="libraryfunc">
	<description>
		Finds and returns a table containing all files and folders in the given path.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">file to check existance</arg>
		<arg name="gamePath" type="string">game path to use</arg>
		<arg name="sorting" type="string" default="nameasc">the sorting to use. Valid are `nameasc`, `namedesc`, `dateasc`, `datedesc`</arg>
	</args>
	<rets>
		<ret name="files" type="table">A table containing all found files</ret>
		<ret name="files" type="table">A table containing all found folders</ret>
	</rets>
</function>