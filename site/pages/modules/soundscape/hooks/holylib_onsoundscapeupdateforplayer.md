<function name="HolyLib:OnSoundScapeUpdateForPlayer" parent="" type="hook">
	<description>
		Called before a soundscape tries to update for the given player.<br>
		Return `true` to block the call and any further calls for this tick and additionally,<br>
		the currently set soundscape entity for the active soundscapeUpdate will be applied to the player.<br>
		You can set it using `soundscape.SetCurrentSoundscape` inside the hook.<br>
		<added version="0.8"></added>
		<note>
			This hook needs to be enabled using <page>soundscape.EnableUpdateHook</page>
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="currentSoundscape" type="Entity"></arg>
		<arg name="currentPlayer" type="Player"></arg>
	</args>
	<rets>
		<ret name="blockChanges" type="boolean" default="false">block any further calls</ret>
	</rets>
</function>