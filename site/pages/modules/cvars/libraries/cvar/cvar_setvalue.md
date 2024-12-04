<function name="SetValue" parent="cvar" type="libraryfunc">
	<description>
		Sets the value of the given ConVar even if it's blocked behind cheats.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="convarName" type="string">The ConVar to set the value on</arg>
		<arg name="value" type="string">The value to set</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">`true` if the value was successfully set</ret>
	</rets>
</function>