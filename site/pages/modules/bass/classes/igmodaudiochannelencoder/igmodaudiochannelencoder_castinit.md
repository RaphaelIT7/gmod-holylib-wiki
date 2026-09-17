<function name="CastInit" parent="IGModAudioChannelEncoder" type="classfunc">
	<description>
		Initializes sending the encoder's output to a Shoutcast or Icecast server.<br>
		See https://www.un4seen.com/doc/#bassenc/BASS_Encode_CastInit.html<br>
		<note>
			This function requires the `BASSENC` plugin to work at all!<br>
			You can find all the plugins at https://www.un4seen.com/ drop them into the `bin/` folder besides `libbass.so`<br>
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="server" type="string">The server to send the data to, in the form `address:port/mountpoint` (Icecast) or `address:port` (Shoutcast)</arg>
		<arg name="password" type="string">The source password on the server</arg>
		<arg name="content" type="string">The content-type of the stream, eg. `audio/mpeg`</arg>
		<arg name="name" type="string" default="nil">The name of the stream</arg>
		<arg name="url" type="string" default="nil">The URL of the stream's webpage</arg>
		<arg name="genre" type="string" default="nil">The genre of the stream</arg>
		<arg name="desc" type="string" default="nil">The description of the stream</arg>
		<arg name="headers" type="string" default="nil">Additional HTTP headers to send to the server, each one terminated with a carriage return and line feed</arg>
		<arg name="bitrate" type="number" default="0">The bitrate of the stream in kbps, only used for stream directory listings</arg>
		<arg name="flags" type="number" default="0">A combination of `BASS_ENCODE_CAST_` flags</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>
