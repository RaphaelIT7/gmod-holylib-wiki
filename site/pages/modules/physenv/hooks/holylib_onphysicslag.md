<function name="HolyLib:OnPhysicsLag" parent="" type="hook">
	<description>
		Called when the physics simulaton is taking longer than the set lag threshold.<br>
		You can freeze all props here and then return `physenv.IVP_SkipSimulation` to skip the simulation for this tick if someone is trying to crash the server.
		<added version="0.5"></added>
		<changed version="0.7">This was renamed from `HolyLib:PhysicsLag` to `HolyLib:OnPhysicsLag`</changed>
		<changed version="0.8">The arguments `phys1`, `phys2`, `recalcPhys` and `callerFunction` were added</changed>
		<warning>
			Changing the physics simulation in here is not safe, you can abort it using the return value but you shouldn't modify it.<br>
			After the simulation ended, the <page>HolyLib:PostPhysicsLag</page> hook will be called in which you can safely modify physics objects<br>
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="simulationTime" type="number">How long the simulation already took.</arg>
		<arg name="phys1" type="IPhysicsObject"></arg>
		<arg name="phys2" type="IPhysicsObject"></arg>
		<arg name="recalcPhys" type="table">Table containing all physics object that are recalculating their collision rules.**Don't modify them since it's highly unstable!**</arg>
		<arg name="callerFunction" type="string">Name of the internal IVP function that triggered this Lua call</arg>
	</args>
	<rets>
		<ret name="skipType" type="number" default="physenv.IVP_NoSkip"></ret>
	</rets>
</function>

<example>
	<description>Example usage of this hook</description>
	<code>
physenv.SetLagThreshold(50)

hook.Add("HolyLib:OnPhysicsLag", "Example", function(delta, phys1, phys2, recalcPhys, callerFunc)
    local mainEnv = physenv.GetActiveEnvironmentByIndex(0)
    local simulating = mainEnv:IsInSimulation()
    print("Tiggered OnPhysicsLag!", mainEnv, simulating, callerFunc)
            
    mainEnv:SetInSimulation(false)
    for _, v in ipairs(ents.GetAll()) do
        local phys = v:GetPhysicsObject()
	
        if phys:IsValid() and not recalcPhys[phys] then
            if phys:IsPenetrating() then
                v:SetCollisionGroup(COLLISION_GROUP_WORLD)
            end

            phys:EnableMotion(false)
        end
    end
    mainEnv:SetInSimulation(simulating)

    return physenv.IVP_SkipSimulation
end)
	</code>
</example>