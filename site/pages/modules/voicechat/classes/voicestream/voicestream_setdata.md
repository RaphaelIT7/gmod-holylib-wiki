<function name="SetData" parent="VoiceStream" type="classfunc">
	<description>
		Sets the VoiceStream from the given table.<br>
		<added version="0.7"></added>
		<changed version="0.8">
			The `directData` argument was added.
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="table">The table containing the VoiceData to store.<br>key(number) = tick number<br>value(VoiceData) = voice data to store</arg>
		<arg name="directData" type="boolean" default="false">
			directData - If true it will store the VoiceData itself **instead of** creating a copy that would be saved, if you modify the VoiceData after you called this, you will change the VoiceData stored in the stream!<br>
			This argument will reduce memory usage & should improve performance slightly
		</arg>
	</args>
</function>