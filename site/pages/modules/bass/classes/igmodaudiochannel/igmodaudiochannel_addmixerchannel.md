<function name="AddMixerChannel" parent="IGModAudioChannel" type="classfunc">
	<description>
		Adds the given channel into our mixer.<br>
		Binds internally to https://www.un4seen.com/doc/#bassmix/BASS_Mixer_StreamAddChannel.html<br>
		<note>
			This function will throw an error if you call it on a non-mixer channel.
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="otherChannel" type="IGModAudioChannel"></arg>
		<arg name="flags" type="number"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>