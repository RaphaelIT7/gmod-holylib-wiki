<function name="GetClientListeners" parent="gameevent" type="libraryfunc">
	<description>
		Returns a table containing all gameevents the specific client is listening to.<br>
		If not given a valid player, it will return a table containing all players as a key and all gameevents their listening to as the value.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player" default="nil">The Player to get the gameevents from</arg>
	</args>
	<rets>
		<ret name="gameevents" type="table">A table containing all the gameevents the client is listening to.</ret>
	</rets>
</function>