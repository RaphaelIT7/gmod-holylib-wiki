<function name="GetActiveEnvironmentByIndex" parent="physenv" type="libraryfunc">
	<description>
		Returns the physics environment by the given index.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="index" type="number"></arg>
	</args>
	<rets>
		<ret name="IPhysicsEnvironment" type="IPhysicsEnvironment"></ret>
	</rets>
</function>