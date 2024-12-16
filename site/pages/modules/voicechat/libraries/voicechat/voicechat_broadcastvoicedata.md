<function name="BroadcastVoiceData" parent="voicechat" type="libraryfunc">
	<description>
		Sends the given voice data all clients, or only the given table of clients.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="voiceData" type="VoiceData">The Voice data to send</arg>
		<arg name="plys" type="table">A table containing all players it should be sent to.</arg>
	</args>
</function>