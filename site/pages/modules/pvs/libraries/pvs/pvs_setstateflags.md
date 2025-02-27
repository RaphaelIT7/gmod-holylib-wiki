<function name="SetStateFlags" parent="pvs" type="libraryfunc">
	<description>
		Sets the State flag for this entity.
		Unlike <page>pvs.OverrideStateFlags</page>, this won't be reset after the snapshot.
		<warning>
			Only use the `engine` argument if you know what your doing.
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entity" type="Entity">the entity to add. Can also be a <page>table</page> and <page>EntityList</page> of entities</arg>
		<arg name="flag" type="number">the state flags to use</arg>
		<arg name="engine" type="boolean" default="false">If set to `true` you can override the edict flags themselfs instead of just the state flags</arg>
	</args>
</function>