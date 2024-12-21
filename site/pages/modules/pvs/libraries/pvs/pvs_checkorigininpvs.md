<function name="CheckOriginInPVS" parent="pvs" type="libraryfunc">
	<description>
		Checks if the given position is inside the current PVS.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="pos" type="Vector">position to check</arg>
	</args>
	<rets>
		<ret name="inPVS" type="boolean">`true` if the position is inside the current pvs</ret>
	</rets>
</function>