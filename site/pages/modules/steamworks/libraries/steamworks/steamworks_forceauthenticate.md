<function name="ForceAuthenticate" parent="steamworks" type="libraryfunc">
	<description>
		Marks the given client as Authenticated even if they aren't.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="userID" type="number">userid of the given client</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` on success</ret>
	</rets>
</function>