<function name="HolyLib:PostLuaAutoRefresh" parent="" type="hook">
	<description>
		Called after a changed Lua file was refreshed.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileRelPath" type="string">Relative path of the file that was refreshed</arg>
		<arg name="fileName" type="string">Name of the file that was refreshed</arg>
	</args>
</function>