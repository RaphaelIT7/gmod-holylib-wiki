<function name="FillServerInfo" parent="CBaseClient" type="classfunc">
	<description>
		Fills a `SVC_ServerInfo` net message with the server's info and sends it to the client.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="playerSlot" type="number" default="-1">overrides the player slot reported in the server info message sent to the client. Unless <page text="unsafe code">Safety</page> is enabled, this must be `-1` or a valid player slot between `1` and `game.MaxPlayers()`</arg>
	</args>
</function>
