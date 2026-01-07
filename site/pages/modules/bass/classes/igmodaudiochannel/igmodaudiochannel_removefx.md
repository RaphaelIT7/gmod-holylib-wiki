<function name="RemoveFX" parent="IGModAudioChannel" type="classfunc">
	<description>
		Removes the given FX from the channel<br>
		See https://www.un4seen.com/doc/#bass/BASS_FXReset.html<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fxName" type="string">A unique name used for FX so that you can have multiple of the same fx type with unique names you assigned</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>