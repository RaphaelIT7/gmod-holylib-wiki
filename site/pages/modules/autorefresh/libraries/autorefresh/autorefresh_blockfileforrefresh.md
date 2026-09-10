<function name="BlockFileForRefresh" parent="autorefresh" type="libraryfunc">
	<description>
		Blocks (or unblocks) a specific file from ever being refreshed by the auto refresh system, even if it changes on disk.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="filePath" type="string">Relative path of the file</arg>
		<arg name="block" type="boolean">`true` to block the file, `false` to unblock it</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `false` if the file already was in the requested state</ret>
	</rets>
</function>