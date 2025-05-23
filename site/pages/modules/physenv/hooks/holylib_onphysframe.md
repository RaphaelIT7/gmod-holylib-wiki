<function name="HolyLib:OnPhysFrame" parent="" type="hook">
	<description>
		Called when the physics are about to be simulated.
		<note>
			This hook first needs to be enabled by calling <page text="physenv.EnablePhysHook(true)">physenv.EnablePhysHook</page>
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="deltaTime" type="number"></arg>
	</args>
	<rets>
		<ret name="cancel" type="boolean" default="false">Return `true` to stop the engine from doing anything.</ret>
	</rets>
</function>

<example>
	<description>pausing the physics simulation while still allowing the entities to be updated and moved with the physgun</description>
	<code>
physenv.EnablePhysHook(true)
local mainEnv = physenv.GetActiveEnvironmentByIndex(0)
hook.Add("HolyLib:OnPhysFrame", "Example", function(deltaTime)
	mainEnv:Simulate(deltaTime, true) -- the second argument will only cause the entities to update.
	return true -- We stop the engine from running the simulation itself again as else it will result in issue like "Reset physics clock" being spammed
end)
	</code>
	<output>
	</output>
</example>