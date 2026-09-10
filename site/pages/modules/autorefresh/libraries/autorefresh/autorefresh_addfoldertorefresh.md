<function name="AddFolderToRefresh" parent="autorefresh" type="libraryfunc">
	<description>
		Adds a folder to GMod's Lua auto refresh watcher, the same way folders configured by the engine are watched.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="folderName" type="string">Path of the folder to watch</arg>
		<arg name="recursive" type="boolean" default="false">If `true`, also watches all subfolders</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the folder was added</ret>
	</rets>
</function>