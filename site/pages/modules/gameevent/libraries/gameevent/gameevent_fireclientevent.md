<function name="FireClientEvent" parent="gameevent" type="libraryfunc">
	<description>
		Fires the given gameevent only for the specific player
		<added version="0.5"></added>
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="event" type="IGameEvent">The gameevent to fire.</arg>
		<arg name="ply" type="ClientArg">The Player to fire the gameevent on</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the event was successfully fired.</ret>
	</rets>
</function>