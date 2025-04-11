<function name="FindInPAS" parent="pas" type="libraryfunc">
	<description>
		Returns a sequential table containing all entities in that PAS.
		<added version="0.5"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="position" type="Vector">The vector to use to find for entities. If given a Entity, it will use it's position.</arg>
	</args>
	<rets>
		<ret name="entities" type="table">All entities found in the PAS</ret>
	</rets>
</function>