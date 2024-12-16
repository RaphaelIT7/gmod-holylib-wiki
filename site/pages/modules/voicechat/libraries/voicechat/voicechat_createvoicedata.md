<function name="CreateVoiceData" parent="voicechat" type="libraryfunc">
	<description>
		Sends the given voice data to the given client.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="plySlot" type="number" default="0">The player slot to use.</arg>
		<arg name="data" type="string" default="NULL">The Voice data to use.</arg>
		<arg name="length" type="number" default="0">The length of the voice data</arg>
	</args>
	<rets>
		<ret name="voiceData" type="VoiceData">The newly created VoiceData</ret>
	</rets>
</function>