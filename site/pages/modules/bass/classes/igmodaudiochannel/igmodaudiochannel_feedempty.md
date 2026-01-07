<function name="FeedEmpty" parent="IGModAudioChannel" type="classfunc">
	<description>
		Feeds null data into the channel for the given ms frame using the given samplerate and channels.<br>
		<note>
			This function will throw an error if you call it on a non-push channel.
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ms" type="number">time in ms to feed into the channel</arg>
		<arg name="samplerate" type="number"></arg>
		<arg name="channels" type="number"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>