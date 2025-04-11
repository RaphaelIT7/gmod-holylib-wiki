<function name="CheckBoxInPAS" parent="pas" type="libraryfunc">
	<description>
		Checks if the given pox is inside the PAS.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="mins" type="Vector">The mins of the box</arg>
		<arg name="maxs" type="Vector">The maxs of the box</arg>
		<arg name="position" type="Vector">The vector to use to find for entities. If given a Entity, it will use it's position.</arg>
	</args>
	<rets>
		<ret name="inPAS" type="boolean">Returns `true` if the box is inside the PAS</ret>
	</rets>
</function>