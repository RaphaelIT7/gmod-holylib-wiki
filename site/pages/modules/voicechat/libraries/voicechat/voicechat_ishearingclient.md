<function name="IsHearingClient" parent="voicechat" type="libraryfunc">
	<description>
		Returns whether the given client can hear the target client.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player to check.</arg>
		<arg name="targetPly" type="Player">The target player to check if they can be heard.</arg>
	</args>
	<rets>
		<ret name="canHear" type="boolean">Returns `true` if the player can hear the target player</ret>
	</rets>
</function>