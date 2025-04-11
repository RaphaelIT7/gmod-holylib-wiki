<function name="CollideGetAABB" parent="physcollide" type="libraryfunc">
	<description>
		Returns the AABB of the given `CPhysCollide`
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="collide" type="CPhysCollide"></arg>
		<arg name="origin" type="Vector"></arg>
		<arg name="rotation" type="Angle"></arg>
	</args>
	<rets>
		<ret name="mins" type="Vector"></ret>
		<ret name="maxs" type="Vector"></ret>
	</rets>
</function>