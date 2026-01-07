<function name="SetMixerMatrix" parent="IGModAudioChannel" type="classfunc">
	<description>
		Sets the channel's mixer matrix.
		See https://www.un4seen.com/doc/#bassmix/BASS_Mixer_ChannelIsActive.html for more details<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="matrix" type="table"></arg>
		<arg name="time" type="number" default="0"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>