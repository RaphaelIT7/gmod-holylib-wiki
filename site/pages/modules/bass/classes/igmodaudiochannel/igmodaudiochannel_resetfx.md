<function name="ResetFX" parent="IGModAudioChannel" type="classfunc">
	<description>
		Resets the given FX<br>
		See https://www.un4seen.com/doc/#bass/BASS_FXReset.html<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fxName" type="string">The unique name for the FX</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>