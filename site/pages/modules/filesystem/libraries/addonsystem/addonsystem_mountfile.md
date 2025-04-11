<function name="MountFile" parent="addonsystem" type="libraryfunc">
	<description>
		Mounts the given `.gma` file
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="filePath" type="string">Path to the GMA file</arg>
	</args>
	<rets>
		<ret name="files" type="table">Returns a table containing all the mounted files from the GMA</ret>
	</rets>
</function>