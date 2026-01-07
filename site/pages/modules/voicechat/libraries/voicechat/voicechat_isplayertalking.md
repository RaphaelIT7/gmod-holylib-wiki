<function name="IsPlayerTalking" parent="voicechat" type="libraryfunc">
	<description>
		Returns whether the given player is considered to be actively talking.
		<added version="0.8"></added>
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg">The Player that should be checked.</arg>
	</args>
	<rets>
		<ret name="isTalking" type="boolean">Returns `true` if the player is currently talking.</ret>
	</rets>
</function>