<function name="GetInt" parent="IGameEvent" type="classfunc">
	<description>
		Returns the integer stored in the specific key.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="key" type="string">The key to get the value of</arg>
		<arg name="fallback" type="number">The fallback value if the key doesn't exist / isn't set</arg>
	</args>
	<rets>
		<ret name="value" type="number">The value found, or the fallback value</ret>
	</rets>
</function>