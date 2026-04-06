<function name="RemoveSearchPaths" parent="filesystem" type="libraryfunc">
	<description>
		Removes all searchpaths of the given game path.
		<added version="0.4"></added>
	</description>
	<unsafe version="0.8">
	<realm>Server</realm>
	<args>
		<arg name="gamePath" type="string">game paths to remove</arg>
	</args>
</function>