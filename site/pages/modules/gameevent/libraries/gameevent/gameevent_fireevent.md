<function name="FireEvent" parent="gameevent" type="libraryfunc">
	<description>
		Fires the given gameevent and networks it to all players.
		<added version="0.5"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="event" type="IGameEvent">The gameevent to fire.</arg>
		<arg name="dontBroadcast" type="boolean" default="false">If `true` the gameevent won't be networked to players.</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the event was successfully fired.</ret>
	</rets>
</function>