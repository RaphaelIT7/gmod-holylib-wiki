<function name="SetIndex" parent="VoiceStream" type="classfunc">
	<description>
		Create a copy of the given VoiceData and sets it onto the specific index and overrides any data thats already present.  
		<added version="0.7"></added>
		<changed version="0.8">
			The `directData` argument was added.
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="index" type="number">the index to store it in</arg>
		<arg name="voiceData" type="VoiceData">the VoiceData to store</arg>
		<arg name="directData" type="boolean" default="false">
			directData - If true it will store the VoiceData itself **instead of** creating a copy that would be saved, if you modify the VoiceData after you called this, you will change the VoiceData stored in the stream!<br>
			This argument will reduce memory usage & should improve performance slightly
		</arg>
	</args>
</function>