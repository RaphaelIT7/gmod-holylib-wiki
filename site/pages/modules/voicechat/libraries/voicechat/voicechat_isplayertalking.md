<function name="IsPlayerTalking" parent="voicechat" type="libraryfunc">
	<description>
		Returns whether the given player is considered to be actively talking.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player that should be checked.</arg>
	</args>
	<rets>
		<ret name="isTalking" type="boolean">Returns `true` if the player is currently talking.</ret>
	</rets>
</function>