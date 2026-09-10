<function name="HolyLib:PreLuaAutoRefresh" parent="" type="hook">
	<description>
		Called before a changed Lua file gets refreshed.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileRelPath" type="string">Relative path of the file that changed</arg>
		<arg name="fileName" type="string">Name of the file that changed</arg>
	</args>
	<rets>
		<ret name="deny" type="boolean">Return `true` to prevent this file from being refreshed</ret>
	</rets>
</function>