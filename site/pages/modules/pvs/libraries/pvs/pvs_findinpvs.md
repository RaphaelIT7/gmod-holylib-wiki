<function name="FindInPVS" parent="pvs" type="libraryfunc">
	<description>
		Returns a sequential table containing all entities in the PVS.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="position" type="Vector">The vector to use to find for entities. If given a Entity, it will use it's position.</arg>
	</args>
	<rets>
		<ret name="entities" type="table">All entities found in the PVS</ret>
	</rets>
</function>