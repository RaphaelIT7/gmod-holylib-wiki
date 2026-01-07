<function name="GetMixerChannelCount" parent="IGModAudioChannel" type="classfunc">
	<description>
		Returns the number of channels the mixer channel that this channel is attached to has.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="channelCount" type="number">`nil` on failure</ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>