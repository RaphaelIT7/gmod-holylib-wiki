<function name="__index" parent="CPhysPolySoup" type="classfunc">
	<description>
		Internally seaches first in the metatable table for the key.
		If it fails to find it, it will search in the lua table before returning.
		If you try to get multiple values from the lua table, just use `CPhysPolySoup:GetTable()`
	</description>
	<realm>Server</realm>
	<args>
		<arg name="key" type="string"></arg>
	</args>
	<rets>
		<ret name="any" type="CPhysPolySoup"></ret>
	</rets>
</function>