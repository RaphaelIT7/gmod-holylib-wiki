<function name="TestPAS" parent="pas" type="libraryfunc">
	<description>
		Tests if the give hear position is inside the given pas.
		<added version="0.3"></added>
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