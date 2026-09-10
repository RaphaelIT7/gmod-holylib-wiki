<function name="FindInterface" parent="luathreads" type="libraryfunc">
	<description>
		Finds a <page>LuaInterface</page> by its name. (See <page>LuaInterface:SetName</page>)
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">Name of the interface to look for</arg>
	</args>
	<rets>
		<ret name="interface" type="LuaInterface">The found interface, or `nil` if none matched</ret>
	</rets>
</function>