<function name="GetStateFlags" parent="pvs" type="libraryfunc">
	<description>
		Returns the state flags for the given entity.
		<warning>
			Only use the `engine` argument if you know what your doing
		</warning>
		<added version="0.2"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entity" type="Entity">the entity to add. Can also be a <page>table</page> and <page>EntityList</page> of entities</arg>
		<arg name="engine" type="boolean" default="false">If set to `true` you can override the edict flags themselfs instead of just the state flags</arg>
	</args>
	<rets>
		<ret name="flags" type="number">The flags set on the entity. Returns a <page>table</page>(Key: Entity, Value: flags) when given a table or EntityList</ret>
	</rets>
</function>