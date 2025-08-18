<function name="GetCurrentTick" parent="VoiceStream" type="classfunc">
	<description>
		Returns the VoiceData of the current tick without changing the internal tick count
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="directData" type="boolean" default="false">
			If true it will return the VoiceData itself **instead of** creating a copy<br>
			If you modify it you will change the VoiceData stored in the stream!
		</arg>
	</args>
	<rets>
		<ret name="voiceData" type="VoiceData">Copy of the internally stored VoiceData for the current tick or `nil` if the current tick had no VoiceData</ret>
	</rets>
</function>