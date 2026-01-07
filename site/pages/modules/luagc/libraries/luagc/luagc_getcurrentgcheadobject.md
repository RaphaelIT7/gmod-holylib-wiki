<function name="GetCurrentGCHeadObject" parent="luagc" type="libraryfunc">
	<description>
		Returns the current GCobject that's at the head of the list.<br>
		<note>
			The head object is **always** the newest one.
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="object" type="any"></ret>
	</rets>
</function>