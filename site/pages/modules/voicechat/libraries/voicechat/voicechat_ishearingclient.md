<function name="IsHearingClient" parent="voicechat" type="libraryfunc">
	<description>
		Returns whether the given client can hear the target client.
		<changed version="0.8">
			The `ply` and `targetPly` arguments were changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg">The Player to check.</arg>
		<arg name="targetPly" type="ClientArg">The target player to check if they can be heard.</arg>
	</args>
	<rets>
		<ret name="canHear" type="boolean">Returns `true` if the player can hear the target player</ret>
	</rets>
</function>