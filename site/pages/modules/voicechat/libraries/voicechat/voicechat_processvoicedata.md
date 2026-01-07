<function name="ProcessVoiceData" parent="voicechat" type="libraryfunc">
	<description>
		Let's the server process the VoiceData like it was received from the client.<br>
		This can be a bit performance intense.  
		<note>
			This will ignore the set player slot!
		</note>
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg">The Player that should be used to process the voice data.</arg>
		<arg name="voiceData" type="VoiceData">The Voice data to process</arg>
	</args>
</function>