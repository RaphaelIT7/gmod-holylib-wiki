<function name="CreateEncoder" parent="IGModAudioChannel" type="classfunc">
	<description>
		Creates a encoder and returns it, on failure it returns `nil` with the second return value containing the error reason<br>
		You can still provide a full filename into which the channel its bound to is slowly written<br>
		unlike <page>IGModAudioChannel:EncodeToDisk</page> this works on non-`decode` channels though it written bit by bit as the channel plays.<br>
		Valid encoders are:<br>
		- `wav` (Requires `BASSENC` plugin)<br>
		- `aiff` (Requires `BASSENC` plugin)<br>
		- `mp3` (Requires `BASSENC_MP3` plugin)<br>
		- `ogg` (Requires `BASSENC_OGG` plugin)<br>
		- `opus` (Requires `BASSENC_OPUS` plugin)<br>
		- `flac` (Requires `BASSENC_FLAC` plugin)<br>
		<note>
			This function requires the `BASSENC` plugin to work at all!<br>
			You can find all the plugins at https://www.un4seen.com/ drop them into the `bin/` folder besides `libbass.so`<br>
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string"></arg>
		<arg name="bassFlags" type="number"></arg>
	</args>
	<rets>
		<ret name="encoder" type="IGModAudioChannelEncoder">nil on failure</ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>