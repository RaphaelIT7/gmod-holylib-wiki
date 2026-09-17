<function name="ServerInit" parent="IGModAudioChannelEncoder" type="classfunc">
	<description>
		Sets up the encoder as a Shoutcast/Icecast source server, which listening clients can directly connect to.<br>
		See https://www.un4seen.com/doc/#bassenc/BASS_Encode_ServerInit.html<br>
		<note>
			This function requires the `BASSENC` plugin to work at all!<br>
			You can find all the plugins at https://www.un4seen.com/ drop them into the `bin/` folder besides `libbass.so`<br>
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="port" type="string">The port to listen on</arg>
		<arg name="buffer" type="number">The client buffer length in bytes</arg>
		<arg name="burst" type="number">The buffer level required to trigger a burst of data in bytes</arg>
		<arg name="flags" type="number">A combination of `BASS_ENCODE_SERVER_` flags</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>
