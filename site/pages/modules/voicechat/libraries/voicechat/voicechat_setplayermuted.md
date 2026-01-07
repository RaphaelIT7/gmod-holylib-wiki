<function name="SetPlayerMuted" parent="voicechat" type="libraryfunc">
	<description>
		Mutes the given player and stopping GM:PlayerCanHearPlayersVoice from being called.
		<added version="0.8"></added>
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg"></arg>
		<arg name="muted" type="boolean" default="false">If they should be muted or unmuted</arg>
	</args>
</function>