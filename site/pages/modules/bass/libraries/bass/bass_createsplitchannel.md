<function name="CreateSplitChannel" parent="bass" type="libraryfunc">
	<description>
		Creates a split channel using the given channel<br>
		A split channel shares the same buffer with the given channel<br>
		See https://www.un4seen.com/doc/#bassmix/BASS_Split_StreamCreate.html for more details.<br>
		<note>
			This function requires the `BassMix` plugin to work at all!<br>
			You can find all the plugins at https://www.un4seen.com/ drop them into the `bin/` folder besides `libbass.so`<br>
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="channel" type="IGModAudioChannel"></arg>
		<arg name="flags" type="number"></arg>
	</args>
	<rets>
		<arg name="channel" type="IGMODAudioChannel">The created channel. `nil` on error</arg>
		<arg name="errMsg" type="string" default="nil">The error string</arg>
	</rets>
</function>