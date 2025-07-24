<function name="isblocked" parent="debug" type="libraryfunc">
	<description>
		Checks if the function is set to be inaccessable by any debug function.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="func" type="function">The function to check</arg>
	</args>
	<rets>
		<ret name="blocked" type="boolean">Returns `true` if the function is set to block any debug access.</ret>
	</rets>
</function>