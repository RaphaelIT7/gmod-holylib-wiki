<function name="Delete" parent="filesystem" type="libraryfunc">
	<description>
		Deletes the given file or folder.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">file/folder to delete</arg>
		<arg name="gamePath" type="string" default="DATA">game path to use</arg>
	</args>
</function>