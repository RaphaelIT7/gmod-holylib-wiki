<function name="SetDebugName" parent="bf_write" type="classfunc">
	<description>
		Sets the debug name.<br>
		<warning>
			You **should** keep a reference to the string as else this might be corrupted.<br>
			So store it somewhere, where the garbage collector won't delete it.<br>
			This is because internally, it sets the pointer of the debug name to the lua string, instead of copying over the actual string.
		</warning>
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string"></arg>
	</args>
</function>