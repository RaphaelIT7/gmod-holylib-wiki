<function name="Open" parent="filesystem" type="libraryfunc">
	<description>
		Opens the given file from the given game path.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">file to open</arg>
		<arg name="fileMode" type="string">Can be `r`, `rb`, `w`, `wb`, `a`, `ab`</arg>
		<arg name="gamePath" type="string" default="GAME">game path to use</arg>
	</args>
	<rets>
		<ret name="file" type="File">Opens the given file or returns `nil` on failure</ret>
	</rets>
</function>