<function name="GetNextTick" parent="VoiceStream" type="classfunc">
	<description>
		Returns the VoiceData of the next tick and increments the internal tick counter by one.
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
		<ret name="voiceData" type="VoiceData">Copy of the internally stored VoiceData for the next tick or `nil` if the next tick had no VoiceData</ret>
	</rets>
</function>