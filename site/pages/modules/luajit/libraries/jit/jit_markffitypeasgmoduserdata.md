<function name="markFFITypeAsGmodUserData" parent="jit" type="libraryfunc">
	<description>
		If ffi is enabled in the config, then this will allow you to mark cdata to be compatible with gmod allowing you to mimic types.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="cdata">The cdata to get the type from</ret>
	</args>
</function>