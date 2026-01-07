<function name="SetAttribute" parent="IGModAudioChannel" type="classfunc">
	<description>
		Sets a channel attribute to the given value.<br>
		See https://www.un4seen.com/doc/#bass/BASS_ChannelSetAttribute.html<br>
		(all `BASS\_ATTRIB\_` enums are exposed inside the `bass.` table)<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="attribute" type="number"></arg>
		<arg name="value" type="number"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
		<ret name="errMsg" type="string" default="nil"></ret>
	</rets>
</function>