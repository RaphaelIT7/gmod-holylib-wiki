<function name="SetInSimulation" parent="IPhysicsEnvironment" type="classfunc">
	<description>
		Overwrites the internal flag that <page>IPhysicsEnvironment:IsInSimulation</page> reads from.<br>
		HolyLib itself uses this to temporarily clear the flag while calling the `HolyLib:PostPhysicsLag` hook and restores it afterwards.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="inSimulation" type="boolean">The new value for the internal simulation flag</arg>
	</args>
</function>
