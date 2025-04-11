<function name="HolyLib:PostProcessGameEvent" parent="" type="hook">
	<description>
		Called after the engine processed the received gameevent list.<br>
		See <page>HolyLib:PreProcessGameEvent</page> if you want to cancel it.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player that wants to listen to the events, can be `NULL` if it's called before a player spawned</arg>
		<arg name="gameEvents" type="table">The gameevents he wants to listen to</arg>
		<arg name="entIndex" type="number">The entindex of the player</arg>
	</args>
</function>