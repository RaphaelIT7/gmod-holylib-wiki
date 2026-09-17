<function name="GetGameServerSteamID" parent="steamworks" type="libraryfunc">
	<description>
		Returns the SteamID64 of the Game Server.
		<note>
			Throws a lua error if the Steam Server hasn't been created yet.
		</note>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="steamID64" type="string">the Game Server's SteamID64 as a string</ret>
	</rets>
</function>
