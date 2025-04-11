<function name="HolyLib:PreCheckTransmit" parent="" type="hook">
	<description>
		Called before the transmit checks are done.<br>
		Internally called before `CServerGameEnts::CheckTransmit` is executed.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player for which the transmit checks are done</arg>
	</args>
	<rets>
		<ret name="cancel" type="boolean">Return `true` to stop the engine from running any transmit checks</ret>
	</rets>
</function>