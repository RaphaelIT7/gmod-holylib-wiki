<function name="HolyLib:OnPlayerStoppedTalking" parent="" type="hook">
	<description>
		Called when a player stops talking<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player that wants to listen to the events, can be `NULL` if it's called before a player spawned</arg>
	</args>
</function>