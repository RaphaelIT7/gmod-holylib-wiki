<function name="GetStoredCode" parent="gmoddatapack" type="libraryfunc">
	<description>
		Returns the processed code that is stored, this will be the code that is sent to clients.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">The Lua file path should be the same as its stringtable `client_lua_files` entry</arg>
	</args>
	<rets>
		<ret name="code" type="string">Returns `nil` if it didn't find the file or something else went wrong.</ret>
	</rets>
</function>