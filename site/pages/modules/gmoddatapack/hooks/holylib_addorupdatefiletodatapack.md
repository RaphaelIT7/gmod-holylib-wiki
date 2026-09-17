<function name="HolyLib:AddOrUpdateFileToDataPack" parent="" type="hook">
	<description>
		Intended to be called whenever a Lua file gets added or updated in the server's GModDataPack, before its contents are tokenized/compressed and sent to clients.<br>
		<warning>
			This hook is currently disabled - the code that would call it is commented out in HolyLib's source, so it does **not** fire in the current version of the module.
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">name/path of the Lua file</arg>
		<arg name="fileSource" type="string">the file's source path</arg>
		<arg name="fileContents" type="string">the file's current contents</arg>
	</args>
</function>
