<function name="IsAttributeSliding" parent="IGModAudioChannel" type="classfunc">
	<description>
		Returns `true` if the given attribute is actively sliding to a value over time.<br>
		See https://www.un4seen.com/doc/#bass/BASS_ChannelIsSliding.html (all `BASS_ATTRIB_` enums are exposed inside the `bass.` table)<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="attribute" type="number"></arg>
	</args>
	<rets>
		<ret name="sliding" type="boolean">`nil` on failure</ret>
	</rets>
</function>