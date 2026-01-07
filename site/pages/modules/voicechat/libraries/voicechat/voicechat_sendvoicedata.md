<function name="SendVoiceData" parent="voicechat" type="libraryfunc">
	<description>
		Sends the given voice data to the given client.
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg">The Player to send the Voice Data to.</arg>
		<arg name="voiceData" type="VoiceData">The Voice data to send</arg>
	</args>
</function>