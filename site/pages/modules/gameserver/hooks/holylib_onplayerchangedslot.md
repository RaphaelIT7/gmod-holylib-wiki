<function name="HolyLib:OnPlayerChangedSlot" parent="" type="hook">
	<description>
		Called **after** a player was moved to a different slot.<br>
		This happens when a player on a player slot above 128 tries to spawn.<br>
		<br>
		Why is this done? Because any player above 128 is utterly unstable and can only stabily exist as a CGameClient.<br>
		if a CBasePlayer entity is created on a slot above 128 expect stability issues!
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="oldPlayerSlot" type="number"></arg>
		<arg name="newPlayerSlot" type="number"></arg>
	</args>
</function>