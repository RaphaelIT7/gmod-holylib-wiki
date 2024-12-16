<function name="GetRegistry" parent="HolyLib" type="libraryfunc">
	<description>
		Returns the Lua registry -> `debug.getregistry()` before it was nuked.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="registry" type="table">The registry</ret>
	</rets>
</function>