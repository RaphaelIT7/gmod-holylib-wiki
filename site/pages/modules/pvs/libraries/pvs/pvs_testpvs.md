<function name="TestPVS" parent="pvs" type="libraryfunc">
	<description>
		Tests if the give origin position is inside the given pvs.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="pasPosition" type="Vector">The position to use the PAS from. If given a Entity, it will use it's position. If given a <page>EntityList</page> it will loop thru all of them and return a table instead.</arg>
		<arg name="hearPosition" type="Vector">The position to use as hearing. If given a Entity, it will use it's position.</arg>
	</args>
	<rets>
		<ret name="inPAS" type="boolean">Returns `true` if the position is in the PAS. If given a <page>EntityList</page> it will return a table instead containing all positions</ret>
	</rets>
</function>