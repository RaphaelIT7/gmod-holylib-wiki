<function name="Simulate" parent="IPhysicsEnvironment" type="classfunc">
	<description>
		Simulates the given delta time in the environment.<br>
		If `onlyEntities` is set, it will only update the Entities, without simulating the physics environment.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="deltaTime" type="number"></arg>
		<arg name="onlyEntities" type="boolean" default="false"></arg>
	</args>
	<rets>
	</rets>
</function>