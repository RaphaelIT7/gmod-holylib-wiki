<function name="HolyLib:OnPlayerGotOffLadder" parent="" type="hook">
	<description>
		Called when a player gets off a ladder.<br>
		Direct bind to `CFuncLadder::PlayerGotOn`
		<note>
			This currently only works with `func_useableladder` ladders.
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ent" type="Entity">The Ladder Entity</arg>
		<arg name="ply" type="Player">The Player that got off the Ladder</arg>
	</args>
</function>