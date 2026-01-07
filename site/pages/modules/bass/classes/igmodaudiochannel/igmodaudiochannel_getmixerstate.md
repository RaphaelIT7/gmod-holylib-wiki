<function name="GetMixerState" parent="IGModAudioChannel" type="classfunc">
	<description>
		Returns how a mixer would see the channels current state which could differ when buffering<br>
		See https://www.un4seen.com/doc/#bassmix/BASS_Mixer_ChannelIsActive.html for more details<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="state" type="number"></ret>
	</rets>
</function>