<function name="GetReferences" parent="luagc" type="libraryfunc">
	<description>
		Returns a table containing **all** GCObjects that have a reference stored to the given object.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="object" type="any">Object to check</arg>
	</args>
	<rets>
		<ret name="references" type="table"></ret>
	</rets>
</function>