<type name="holylib_gameserver_rawclients" category="" is="convar">
	<summary>
		# holylib_gameserver_rawclients = 0
		If enabled, `CGameClient` that are empty / have no active player are still considered valid allowing you to access them<br>
		`CGameClient:__tostring()` will return `CGameClient [EMPTY]` for empty clients!<br>
		<note>
			Internally it checks using `CBaseClient:IsConnected()` to see if a client is empty or not!
		</note>
		<added version="0.8"></added>
	</summary>
</type>