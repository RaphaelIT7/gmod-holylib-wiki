<function name="AddEntityToPVS" parent="pvs" type="libraryfunc">
	<description>
		Adds the given entity to the PVS
		<note>
			You should only use this inside the [SetupPlayerVisibility](https://wiki.facepunch.com/gmod/GM:SetupPlayerVisibility) hook.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entity" type="Entity">the entity to add. Can also be a <page>table</page> and <page>EntityList</page> of entities</arg>
	</args>
</function>