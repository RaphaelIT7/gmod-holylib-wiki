<function name="RemoveSearchPath" parent="filesystem" type="libraryfunc">
	<description>
		Removes the given folder from the given gamepath. 
	</description>
	<realm>Server</realm>
	<args>
		<arg name="folderPath" type="string">path to the given folder</arg>
		<arg name="gamePath" type="string">game path to remove the folder from</arg>
	</args>
	<ret>
		<ret name="success" type="boolean">Returns `true` if the searchpath was removed</ret>
	</ret>
</function>