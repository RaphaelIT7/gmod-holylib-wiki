<function name="IsPlayerMuted" parent="voicechat" type="libraryfunc">
	<description>
		Returns `true` if the given player was muted using <page>voicechat.SetPlayerMuted</page>
		<added version="0.8"></added>
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg"></arg>
	</args>
	<rets>
		<ret name="muted" type="boolean"></ret>
	</rets>
</function>