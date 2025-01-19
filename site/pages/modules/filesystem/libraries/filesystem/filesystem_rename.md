<function name="Rename" parent="filesystem" type="libraryfunc">
	<description>
		Renames the given file/folder to the new name.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="oldFileName" type="string">the current/old fileName</arg>
		<arg name="newFileName" type="string">the new fileName to rename it into</arg>
		<arg name="gamePath" type="string" default="DATA">game path to use</arg>
	</args>
	<rets>
		<ret name="renamed" type="boolean">Returns `true` if the file/folder was renamed</ret>
	</rets>
</function>