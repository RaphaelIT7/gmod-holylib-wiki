<function name="CreatePolyObjectStatic" parent="IPhysicsEnvironment" type="classfunc">
	<description>
		Creates a new static IPhysicsObject in the environment.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="collide" type="CPhysCollide"></arg>
		<arg name="materialIndex" type="number"></arg>
		<arg name="origin" type="Vector"></arg>
		<arg name="angles" type="Angle"></arg>
		<arg name="objectparams_t" type="table"></arg>
	</args>
	<rets>
		<ret name="" type="IPhysicsObject"></ret>
	</rets>
</function>