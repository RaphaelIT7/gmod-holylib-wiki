<function name="HolyLib:OnPhysicsLag" parent="" type="hook">
	<description>
		Called when the physics simulaton is taking longer than the set lag threshold.<br>
		You can freeze all props here and then return `physenv.IVP_SkipSimulation` to skip the simulation for this tick if someone is trying to crash the server.
		<changed version="0.7">This was renamed from `HolyLib:PhysicsLag` to `HolyLib:OnPhysicsLag`</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="simulationTime" type="number">How long the simulation already took.</arg>
	</args>
	<rets>
		<ret name="skipType" type="number" default="physenv.IVP_NoSkip"></ret>
	</rets>
</function>