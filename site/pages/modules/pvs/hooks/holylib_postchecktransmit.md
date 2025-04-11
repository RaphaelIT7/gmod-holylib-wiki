<function name="HolyLib:PostCheckTransmit" parent="" type="hook">
	<description>
		Called after the transmit checks are done.<br>
		Internally called after `CServerGameEnts::CheckTransmit` is executed.
		<added version="0.3"></added>
		<changed version="0.7">
			The second argument was **removed**.<br>
			Use <page>pvs.GetEntitiesFromTransmit</page> instead.
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player for which the transmit checks are done</arg>
	</args>
</function>