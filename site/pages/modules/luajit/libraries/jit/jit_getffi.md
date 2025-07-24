<function name="getffi" parent="jit" type="libraryfunc">
	<description>
		If ffi is enabled in the config, then this will return a valid table, else it will return nothing.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="ffi" type="table">Returns `true` if the box is inside the PAS</ret>
	</rets>
</function>