<function name="HolyLib:OnSetSignonState" parent="" type="hook">
	<description>
		Called when the engine is about to change the client's SignonState.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="client" type="CGameClient">The client thats changing the SignOnState</arg>
		<arg name="state" type="number">the desired signOnState</arg>
		<arg name="spawnCount" type="number"></arg>
	</args>
	<rets>
		<ret name="cancel" type="boolean" default="false">Return `true` to stop the engine.</ret>
	</rets>
</function>