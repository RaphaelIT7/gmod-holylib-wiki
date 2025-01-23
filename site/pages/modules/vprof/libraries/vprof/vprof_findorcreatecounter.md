<function name="FindOrCreateCounter" parent="vprof" type="libraryfunc">
	<description>
		Returns or counter the given vprof counter.  
		<note>
			If the vprof counter limit is hit, it will return a dummy vprof counter!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">counter name to search for</arg>
		<arg name="group" type="number">
			the [CounterGroup_t](https://github.com/RaphaelIT7/obsolete-source-engine/blob/a49f02f4133fd54b758c8e4a8c41ba4323f1ae8e/public/tier0/vprof.h#L386-L395) group.<br>
			List:<br>
			`COUNTER_GROUP_DEFAULT = 0`<br>
			`COUNTER_GROUP_NO_RESET = 1`<br>
			`COUNTER_GROUP_TEXTURE_GLOBAL = 2`<br>
			`COUNTER_GROUP_TEXTURE_PER_FRAME = 3`<br>
			`COUNTER_GROUP_TELEMETRY = 4`<br>
		</arg>
	</args>
	<rets>
		<ret name="counter" type="VProfCounter">the found/created vprof counter.</ret>
	</rets>
</function>