<function name="RemoveClientListener" parent="gameevent" type="libraryfunc">
	<description>
		Removes the player from listening to the given gameevent.<br>
		If the given gameevent is nil it will remove the player from all gameevents.
		<added version="0.4"></added>
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg">The Player to get the gameevents from</arg>
		<arg name="gameevent" type="string" default="nil">The event to remove the player from. If `nil` the player is removed from all events.</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the client was successfully removed</ret>
	</rets>
</function>