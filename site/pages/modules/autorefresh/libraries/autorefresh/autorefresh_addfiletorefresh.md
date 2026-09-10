<function name="AddFileToRefresh" parent="autorefresh" type="libraryfunc">
	<description>
		Adds a single file to the list of files that are periodically checked for changes using a background thread pool. (See <page>holylib_autorefresh_threads</page>)<br>
		This is separate from folder watching and is useful for watching a file that isn't inside a watched folder.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">Path (relative to `MOD`) of the file to watch</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `false` if the file was already being watched</ret>
	</rets>
</function>