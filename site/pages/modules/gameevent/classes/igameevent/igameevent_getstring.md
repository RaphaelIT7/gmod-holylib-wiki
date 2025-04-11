<function name="GetString" parent="IGameEvent" type="classfunc">
	<description>
		Returns the string stored in the specific key.
		<added version="0.5"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="key" type="string">The key to get the value of</arg>
		<arg name="fallback" type="string">The fallback value if the key doesn't exist / isn't set</arg>
	</args>
	<rets>
		<ret name="value" type="string">The value found, or the fallback value</ret>
	</rets>
</function>