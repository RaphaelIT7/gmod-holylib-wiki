<function name="AddEntityToTransmit" parent="pvs" type="libraryfunc">
	<description>
		Adds the given Entity to be transmitted.
		<note>
			Only use this function inside the <page>HolyLib:PreCheckTransmit</page> or <page>HolyLib:PostCheckTransmit</page> hook!
		</note>
		<verfiy>
			Verify that the `always` works as intented.
		</verfiy>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entity" type="Entity">the entity to add. Can also be a <page>table</page> and <page>EntityList</page> of entities</arg>
		<arg name="always" type="boolean" default="false">Set to `true` if they should always be transmitted / ignore the pvs</arg>
	</args>
</function>