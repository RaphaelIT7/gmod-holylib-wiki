<function name="HolyLib:PostPhysFrame" parent="" type="hook">
	<description>
		Called after physics were simulated and how long it took to simulate in milliseconds.
		<added version="0.8"></added>
		<note>
			This hook first needs to be enabled by calling <page text="physenv.EnablePhysHook(true)">physenv.EnablePhysHook</page>
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="deltaTime" type="number"></arg>
		<arg name="simulationTime" type="number">How long the simulation took</arg>
	</args>
</function>