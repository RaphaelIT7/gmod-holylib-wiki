<function name="GetEnvironmentValue" parent="HolyLib" type="libraryfunc">
	<description>
		Returns the found environment variable or returns `nil
		<added version="0.8"></added>
	</description>
	<unsafe version="0.8"></unsafe>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">Environment variable name</arg>
	</args>
	<rets>
		<ret name="value" type="string">Returns the value or `nil` on failure</ret>
	</rets>
</function>