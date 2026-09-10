<function name="RemoveFolderFromRefresh" parent="autorefresh" type="libraryfunc">
	<description>
		Removes a folder that was previously added with <page>autorefresh.AddFolderToRefresh</page>.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="folderName" type="string">Path of the folder to stop watching</arg>
		<arg name="recursive" type="boolean" default="false">If `true`, also stops watching all subfolders</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the folder was removed</ret>
	</rets>
</function>