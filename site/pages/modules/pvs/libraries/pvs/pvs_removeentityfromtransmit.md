<function name="RemoveEntityFromTransmit" parent="pvs" type="libraryfunc">
	<description>
		Removes the given entity from being transmitted.
		<note>
			Only use this function inside the <page>HolyLib:PreCheckTransmit</page> or <page>HolyLib:PostCheckTransmit</page> hook!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entity" type="Entity">the entity to remove. Can also be a <page>table</page> and <page>EntityList</page> of entities</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">`true` if all Entities were successfully removed from being transmitted.</ret>
	</rets>
</function>