<function name="GetAttribute" parent="IGModAudioChannel" type="classfunc">
	<description>
		Returns the channels attribute value.<br>
		See https://www.un4seen.com/doc/#bass/BASS_ChannelGetAttribute.html (all `BASS_ATTRIB_` enums are exposed inside the `bass.` table)<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="attribute" type="number"></arg>
	</args>
	<rets>
		<ret name="value" type="number">`nil` on failure</ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>