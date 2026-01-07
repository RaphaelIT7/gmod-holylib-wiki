<function name="DestroyLink" parent="IGModAudioChannel" type="classfunc">
	<description>
		Unlinks the other channel from this channel.<br>
		See https://www.un4seen.com/doc/#bass/BASS_ChannelRemoveLink.html (argument order is `this, otherChannel`)<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="otherChannel" type="IGModAudioChannel"></arg>
	</args>
</function>