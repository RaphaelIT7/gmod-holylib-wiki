<function name="FeedEmpty" parent="IGModAudioChannelEncoder" type="classfunc">
	<description>
		Feeds null data into the encoder for the given ms frame using the given samplerate and channels.<br>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ms" type="number">time in ms to feed into the encoder</arg>
		<arg name="samplerate" type="number"></arg>
		<arg name="channels" type="number"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>
