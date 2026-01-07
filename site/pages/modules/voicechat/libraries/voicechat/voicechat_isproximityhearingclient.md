<function name="IsProximityHearingClient" parent="voicechat" type="libraryfunc">
	<description>
		Returns whether the given client can hear the target client in it's proximity.
		<changed version="0.8">
			The `ply` and `targetPly` arguments were changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg">The Player to send the Voice Data to.</arg>
		<arg name="targetPly" type="ClientArg">The target player to check.</arg>
	</args>
	<rets>
		<ret name="canHear" type="boolean">Returns `true` if the player can hear the target player in it's proximity</ret>
	</rets>
</function>