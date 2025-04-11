<function name="RelativePathToFullPath" parent="filesystem" type="libraryfunc">
	<description>
		Returns the full path of the given file/folder relative to the given game path.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="filePath" type="string">the file/folder path to use</arg>
		<arg name="gamePath" type="string">game path that the given file/folder is inside</arg>
	</args>
	<rets>
		<ret name="fullPath" type="string">Returns the full path or `nil` on failure</ret>
	</rets>
</function>

<example>
	<description></description>
	<code>
-- The "MOD_WRITE" game path has a single searchpath that is "/home/container/garrysmod/" in this case.
-- So we expect it to become "/home/container/garrysmod/garrysmod.ver"
print(filesystem.RelativePathToFullPath("garrysmod.ver", "MOD_WRITE"))
	</code>
	<output>
/home/container/garrysmod/garrysmod.ver
	</output>
</example>