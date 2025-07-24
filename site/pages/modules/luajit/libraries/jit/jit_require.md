<function name="require" parent="jit" type="libraryfunc">
	<description>
		LuaJIT's default require function, this function does **not** exist when ffi is disabled.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">The library to load</arg>
	</args>
	<rets>
		<ret name="module" type="table">Returns the loaded library or `nil`</ret>
	</rets>
</function>