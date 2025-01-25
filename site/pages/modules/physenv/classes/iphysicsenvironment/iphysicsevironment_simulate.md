<function name="Simulate" parent="IPhysicsEvironment" type="classfunc">
	<description>
		Simulates the given delta time in the environment.
		If `onlyEntities` is set, it will only update the Entities, without simulating the physics environment.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="deltaTime" type="number"></arg>
		<arg name="onlyEntities" type="bool" default="false"></arg>
	</args>
	<rets>
	</rets>
</function>