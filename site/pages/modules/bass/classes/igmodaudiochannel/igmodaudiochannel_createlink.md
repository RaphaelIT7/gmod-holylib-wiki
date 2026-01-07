<function name="CreateLink" parent="IGModAudioChannel" type="classfunc">
	<description>
		Links the other channel to this channel one-way.<br>
		See https://www.un4seen.com/doc/#bass/BASS_ChannelSetLink.html (argument order is `this, otherChannel`)<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="otherChannel" type="IGModAudioChannel"></arg>
	</args>
</function>