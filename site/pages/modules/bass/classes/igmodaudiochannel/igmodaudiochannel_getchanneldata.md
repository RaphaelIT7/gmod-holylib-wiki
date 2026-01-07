<function name="GetChannelData" parent="IGModAudioChannel" type="classfunc">
	<description>
		Returns the given bytes of channel data - you cannot specify `BASS_DATA_` flags!<br>
		See https://www.un4seen.com/doc/#bass/BASS_ChannelGetData.html<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="size" type="number">limited to a maximum of 64kb</arg>
	</args>
	<rets>
		<ret name="data" type="string">`nil` on failure</ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>