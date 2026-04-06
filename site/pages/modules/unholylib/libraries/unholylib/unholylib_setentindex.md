<function name="SetEntIndex" parent="unholylib" type="libraryfunc">
	<description>
		Sets the EntIndex of the given entity, internally it will attempt to move the entity into the given edict slot.<br>
		If the edict slot is already used, it will **swap** the entities.<br>
		If the new index is `-1` then it will make the entity a server-only entity.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ent" type="Entity">the Entity to change</arg>
		<arg name="index" type="number">index to set/switch with or `-1` to make it a server-only entity</arg>
	</args>
</function>