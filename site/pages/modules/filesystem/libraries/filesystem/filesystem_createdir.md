<function name="CreateDir" parent="filesystem" type="libraryfunc">
	<description>
		Creates a directory in the given path.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="dirName" type="string">folder to create</arg>
		<arg name="gamePath" type="string" default="DATA">game path to use</arg>
	</args>
</function>