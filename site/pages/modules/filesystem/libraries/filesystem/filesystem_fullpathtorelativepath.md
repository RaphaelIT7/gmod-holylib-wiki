<function name="FullPathToRelativePath" parent="filesystem" type="libraryfunc">
	<description>
		Returns the relative path of the given file/folder.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="filePath" type="string">the file/folder path to use</arg>
		<arg name="gamePath" type="string" default="nil">game path that the given file/folder is inside</arg>
	</args>
	<rets>
		<ret name="relativePath" type="string">Returns the relative path or `nil` on failure</ret>
	</rets>
</function>

<example>
	<description></description>
	<code>
-- The "MOD_WRITE" game path has a single searchpath that is "/home/container/garrysmod/" in this case.
-- So we expect it to become "garrysmod.ver"
print(filesystem.FullPathToRelativePath("/home/container/garrysmod/garrysmod.ver", "MOD_WRITE"))
	</code>
	<output>
garrysmod.ver
	</output>
</example>