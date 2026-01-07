<function name="WriteToDisk" parent="IGModAudioChannel" type="classfunc">
	<description>
		Writes the channel into a file always using the `DATA` gamePath, the encoder internally used depends on the filename.<br>
		Valid encoders for file extension are:<br>
		- `.wav` (Requires `BASSENC` plugin)<br>
		- `.aiff` (Requires `BASSENC` plugin)<br>
		- `.mp3` (Requires `BASSENC_MP3` plugin)<br>
		- `.ogg` (Requires `BASSENC_OGG` plugin)<br>
		- `.opus` (Requires `BASSENC_OPUS` plugin)<br>
		- `.flac` (Requires `BASSENC_FLAC` plugin)<br>
		<note>
			This function requires the `BASSENC` plugin to work at all!<br>
			You can find all the plugins at https://www.un4seen.com/ drop them into the `bin/` folder besides `libbass.so`<br>
		</note>
		<warning>
			This function only works on `decode` channels, a channel needs to have `decode` set as a flag when being created<br>
		</warning>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string"></arg>
		<arg name="bassFlags" type="number"></arg>
		<arg name="callback" type="function">
			<callback>
				<arg name="success" type="boolean"></arg>
				<arg name="errMsg" type="string" default="nil"></arg>
			</callback>
		</arg>
		<arg name="async" type="boolean" default="false"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>

<example>
	<description>Example usage of having a `.wav` and making it a `.mp3`</description>
	<code>
bass.PlayFile("data/exampleSong.wav", "decode", function(channel, a, b)
    g_Channel = channel -- Prevent gc from hitting while were processing it
    local flags = bit.bor(0x40000, 0x20000) -- BASS_ENCODE_AUTOFREE | BASS_ENCODE_PCM
	print("Did the job manage to start?", channel:EncodeToDisk("exampleSong.mp3", flags, function(success, errMsg)
       print("Did it work?", success, errMsg)         
    end, true))
end)
	</code>
</example>