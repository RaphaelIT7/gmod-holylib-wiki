<function name="PreventTransmitAllExcept" parent="pvs" type="libraryfunc">
	<description>
		Prevents every entity currently being checked for transmission from being sent, except for the given entity/entities.
		<note>
			Only use this function inside the <page>HolyLib:PreCheckTransmit</page> or <page>HolyLib:PostCheckTransmit</page> hook!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entity" type="Entity">The entity(s) that should keep being transmitted. Can also be a <page>table</page> and <page>EntityList</page> of entities</arg>
		<arg name="ignoreflags" type="number" default="0">A combination of the `pvs.FL_EDICT_*` flags. Entities whose current state flags match any of these bits are skipped and left untouched.</arg>
	</args>
</function>