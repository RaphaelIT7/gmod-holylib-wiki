<function name="FireClientEvent" parent="gameevent" type="libraryfunc">
	<description>
		Fires the given gameevent only for the specific player
	</description>
	<realm>Server</realm>
	<args>
		<arg name="event" type="IGameEvent">The gameevent to fire.</arg>
		<arg name="ply" type="Player">The Player to fire the gameevent on</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the event was successfully fired.</ret>
	</rets>
</function>