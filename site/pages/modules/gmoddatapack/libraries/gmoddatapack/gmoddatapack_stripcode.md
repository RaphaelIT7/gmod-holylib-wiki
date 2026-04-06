<function name="StripCode" parent="gmoddatapack" type="libraryfunc">
	<description>
		Strips the code based off the settings and returns the new stripped code.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="code" type="string">The code to strip</arg>
		<arg name="removeServerCode" type="boolean" default="(ConVar Value)">If server code should be stripped (Default value is <page>holylib_gmoddatapack_removeserverif</page>)</arg>
		<arg name="removeComments" type="boolean" default="(ConVar Value)">If comments should be stripped  (Default value is <page>holylib_gmoddatapack_removecomments</page>)</arg>
		<arg name="tokenizeContent" type="function" default="nil">
			the tokenize function - this acts like <page>HolyLib:OnTokenizeContent</page>
			<callback>
				<arg name="tokens" type="table">The full path to the binary file in which the crash occured in</arg>
				<arg name="fileID" type="number">The fileID of the Lua file (This is the stringtable index in the `client_lua_files` table)</arg>
				<ret name="tokens" type="table">Return value can be a new table of tokens, which will be used as the new contents, or return nil for no change</ret>
			</callback>
		</arg>
	</args>
	<rets>
		<ret name="strippedCode" type="string"></ret>
	</rets>
</function>