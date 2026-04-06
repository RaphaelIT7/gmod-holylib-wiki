<function name="HolyLib:OnServerCrash" parent="" type="hook">
	<description>
		Inside this hook, the server is in a weird state.<br>
		It allows you to attempt to save data **but** try not to cause memory allocations or such, as the entire server will be in a very fragile state.<br>
		The Lua GC is stopped when this hook is called to further reduce the chance of Lua crashing due to instability<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="crashedModule" type="string">The full path to the binary file in which the crash occured in</arg>
	</args>
</function>