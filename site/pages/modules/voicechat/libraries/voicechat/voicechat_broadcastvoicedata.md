<function name="BroadcastVoiceData" parent="voicechat" type="libraryfunc">
	<description>
		Sends the given voice data all clients, or only the given table of clients.
		<changed version="0.8">
			The `plys` argument was changed from previously accepting only a table containing <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="voiceData" type="VoiceData">The Voice data to send</arg>
		<arg name="plys" type="table">A table containing all players it should be sent to. All <page>ClientArg</page> types are accepted</arg>
	</args>
</function>