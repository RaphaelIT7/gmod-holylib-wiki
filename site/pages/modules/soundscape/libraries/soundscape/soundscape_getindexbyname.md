<function name="GetIndexByName" parent="soundscape" type="libraryfunc">
	<description>
		Returns the index of the given soundscape name or returns `nil` if not found.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="soundscapeName" type="string"></arg>
	</args>
	<rets>
		<ret name="soundscapeIndex" type="number"></ret>
	</rets>
</function>