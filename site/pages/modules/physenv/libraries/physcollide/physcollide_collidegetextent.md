<function name="CollideGetExtent" parent="physcollide" type="libraryfunc">
	<description>
		Get the support map for a collide in the given direction.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="collide" type="CPhysCollide"></arg>
		<arg name="origin" type="Vector"></arg>
		<arg name="rotation" type="Angle"></arg>
		<arg name="direction" type="Vector"></arg>
	</args>
	<rets>
		<ret name="mins" type="Vector"></ret>
	</rets>
</function>