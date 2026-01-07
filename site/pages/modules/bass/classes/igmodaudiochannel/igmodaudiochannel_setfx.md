<function name="SetFX" parent="IGModAudioChannel" type="classfunc">
	<description>
		Sets the given FX type onto the channel, use the exposed `bass.FX_` enums for `fxType`.<br>
		See https://www.un4seen.com/doc/#bass/BASS_ChannelSetFX.html for more details<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fxName" type="string">A unique name used for FX so that you can have multiple of the same fx type with unique names you assigned</arg>
		<arg name="fxType" type="number">`bass.FX_` enum</arg>
		<arg name="priority" type="number"></arg>
		<arg name="fxParams" type="table"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>