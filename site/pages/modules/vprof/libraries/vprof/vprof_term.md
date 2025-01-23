<function name="Term" parent="vprof" type="libraryfunc">
	<description>
		Terminates vprof and frees the memory of everything.<br>
		This will invalidate all <page>VProfCounter</page> and <page>VProfNode</page>.<br>
		This means that if you try to use one that you stored in lua, it could crash!
		<note>
			This should probably never be used.
		</note>
	</description>
	<realm>Server</realm>
</function>