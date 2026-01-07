<function name="InsertVoiceData" parent="IGModAudioChannel" type="classfunc">
	<description>
		Feeds the given voicedata into the channel.<br>
		<note>
			This function will throw an error if you call it on a non-push channel.
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="VoiceData"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>