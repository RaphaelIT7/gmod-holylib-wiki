<function name="GetNameByIndex" parent="soundscape" type="libraryfunc">
	<description>
		Returns the name of the given soundscapeIndex or returns `nil` if not found.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="soundscapeIndex" type="number"></arg>
	</args>
	<rets>
		<ret name="soundscapeName" type="string" default="nil"></ret>
	</rets>
</function>