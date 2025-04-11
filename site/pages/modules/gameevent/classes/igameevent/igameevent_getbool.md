<function name="GetBool" parent="IGameEvent" type="classfunc">
	<description>
		Returns the boolean stored in the specific key.
		<added version="0.5"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="key" type="string">The key to get the value of</arg>
		<arg name="fallback" type="boolean">The fallback value if the key doesn't exist / isn't set</arg>
	</args>
	<rets>
		<ret name="value" type="boolean">The value found, or the fallback value</ret>
	</rets>
</function>