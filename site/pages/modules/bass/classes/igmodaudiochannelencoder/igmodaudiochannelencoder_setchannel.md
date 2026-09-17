<function name="SetChannel" parent="IGModAudioChannelEncoder" type="classfunc">
	<description>
		Changes the <page>IGModAudioChannel</page> that this encoder reads its data from.<br>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="channel" type="IGModAudioChannel">The new channel to encode</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>
