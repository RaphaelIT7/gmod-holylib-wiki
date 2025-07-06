<function name="LastPlayerTalked" parent="voicechat" type="libraryfunc">
	<description>
		Returns the last time the given player has talked.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player that we should get the value from.</arg>
	</args>
	<rets>
		<ret name="lastTalked" type="number">Returns the last time they talked</ret>
	</rets>
</function>