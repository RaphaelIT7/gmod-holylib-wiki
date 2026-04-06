<function name="HolyLib:OnTokenizeContent" parent="" type="hook">
	<description>
		This hook is called while the contents of a Lua file are being processed.<br>
		Table entries are sequential - each entry is a table with the following fields:<br>
		\- bool isSpace<br>
		\- number type<br>
		\- string content<br>
		<note>
			This hook is called by the worker thread, and only one lua state can be marked for calling it!
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tokens" type="table">The full path to the binary file in which the crash occured in</arg>
		<arg name="fileID" type="number">The fileID of the Lua file (This is the stringtable index in the `client_lua_files` table)</arg>
	</args>
	<rets>
		<ret name="tokens" type="table">Return value can be a new table of tokens, which will be used as the new contents, or return nil for no change</ret>
	</rets>
</function>