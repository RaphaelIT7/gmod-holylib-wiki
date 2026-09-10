<function name="RunString" parent="holylua" type="libraryfunc">
	<description>
		Runs the given code inside HolyLib's separate <page>holylua</page> interface.<br>
		<note>
			Does nothing if called from inside the HolyLua interface itself.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="code" type="string">The code to run inside the HolyLua interface</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `false` if the HolyLua interface isn't running (See <page>holylib_lua</page>)</ret>
	</rets>
</function>