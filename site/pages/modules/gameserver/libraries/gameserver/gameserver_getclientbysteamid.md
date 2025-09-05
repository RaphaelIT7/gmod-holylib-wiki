<function name="GetClientBySteamID" parent="gameserver" type="libraryfunc">
	<description>
		Returns the CGameClient for the given `steamID` or `nil` on failure. (steamID not steamID64!)
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="steamID" type="string"></arg>
	</args>
	<rets>
		<ret name="client" type="CGameClient"></ret>
	</rets>
</function>