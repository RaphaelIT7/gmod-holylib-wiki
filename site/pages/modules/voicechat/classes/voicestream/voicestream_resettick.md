<function name="ResetTick" parent="VoiceStream" type="classfunc">
	<description>
		Resets the current tick of the voicestream back to the given value or `0`<br>
		Returns the tick it was previously at<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="resetTick" type="number" default="0"></arg>
	</args>
	<rets>
		<ret name="previousTick" type="number">The previous tick that was set</ret>
	</rets>
</function>