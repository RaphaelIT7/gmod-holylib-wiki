<function name="HolyLib:OnPlayerGotOnLadder" parent="" type="hook">
	<description>
		Called when a player gets on a ladder.<br>
		Direct bind to `CFuncLadder::PlayerGotOn`
		<note>
			This currently only works with `func_useableladder` ladders.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ent" type="Entity">The Ladder Entity</arg>
		<arg name="ply" type="Player">The Player that got on the Ladder</arg>
	</args>
</function>