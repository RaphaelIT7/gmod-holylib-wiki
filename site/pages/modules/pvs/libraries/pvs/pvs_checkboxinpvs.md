<function name="CheckBoxInPVS" parent="pvs" type="libraryfunc">
	<description>
		Returns whether or not the given box is inside the PVS.
		<added version="0.2"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="mins" type="Vector">Minimum bounds of the box</arg>
		<arg name="maxs" type="Vector">Maximum bounds of the box</arg>
	</args>
	<rets>
		<ret name="inPVS" type="boolean">`true` if the box is in the pvs</ret>
	</rets>
</function>