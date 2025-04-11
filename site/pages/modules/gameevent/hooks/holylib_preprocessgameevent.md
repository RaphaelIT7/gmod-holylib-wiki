<function name="HolyLib:PreProcessGameEvent" parent="" type="hook">
	<description>
		Called when the client sends the gameevent list it wants to listen to.<br>
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player that wants to listen to the events, can be `NULL` if it's called before a player spawned</arg>
		<arg name="gameEvents" type="table">The gameevents he wants to listen to</arg>
		<arg name="entIndex" type="number">The entindex of the player</arg>
	</args>
	<rets>
		<ret name="cancel" type="boolean">Return `true` to stop the from processing the gameevent list</ret>
	</rets>
</function>