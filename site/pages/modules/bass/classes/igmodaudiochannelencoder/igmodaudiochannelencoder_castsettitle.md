<function name="CastSetTitle" parent="IGModAudioChannelEncoder" type="classfunc">
	<description>
		Sets the title (and optionally the URL) of the current stream started with <page>IGModAudioChannelEncoder:CastInit</page>.<br>
		See https://www.un4seen.com/doc/#bassenc/BASS_Encode_CastSetTitle.html<br>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="title" type="string" default="nil">The title to set</arg>
		<arg name="url" type="string" default="nil">The URL to set</arg>
	</args>
</function>
