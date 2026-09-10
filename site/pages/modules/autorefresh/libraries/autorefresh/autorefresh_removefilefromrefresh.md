<function name="RemoveFileFromRefresh" parent="autorefresh" type="libraryfunc">
	<description>
		Removes a file that was previously added with <page>autorefresh.AddFileToRefresh</page>.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">Path of the file that was passed to <page>autorefresh.AddFileToRefresh</page></arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `false` if the file wasn't being watched</ret>
	</rets>
</function>