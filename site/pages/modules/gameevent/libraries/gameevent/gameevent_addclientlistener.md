<function name="AddClientListener" parent="gameevent" type="libraryfunc">
	<description>
		Adds the given player to listen to the given event.
		<removed>
			Was removed/disabled since it was broken.
		</removed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player to add the event to</arg>
		<arg name="gameevent" type="string">The gameevent the player should listen to</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the player was successfully added to the given gameevent.</ret>
	</rets>
</function>