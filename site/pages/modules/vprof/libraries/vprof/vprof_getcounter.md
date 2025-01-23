<function name="GetCounter" parent="vprof" type="libraryfunc">
	<description>
		Returns the vprof counter of the given index.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="index" type="number">counter index</arg>
	</args>
	<rets>
		<ret name="counter" type="VProfCounter">the found vprof counter or `nil` if it doesn't exist</ret>
	</rets>
</function>