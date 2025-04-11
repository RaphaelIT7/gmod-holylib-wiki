<function name="AddSearchPath" parent="filesystem" type="libraryfunc">
	<description>
		Adds the given folder to the given game paths.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="folderPath" type="string">path to the given folder</arg>
		<arg name="gamePath" type="string">game path to add the folder to</arg>
		<arg name="addToTail" type="boolean" default="false">If `true` it adds the folder as the last game path instead of the first one</arg>
	</args>
</function>