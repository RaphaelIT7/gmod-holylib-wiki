<function name="GetClientByUserID" parent="gameserver" type="libraryfunc">
	<description>
		Returns the CGameClient for the given `userID` or `nil` on failure.
		<added version="0.73"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="userID" type="number"></arg>
	</args>
	<rets>
		<ret name="client" type="CGameClient"></ret>
	</rets>
</function>