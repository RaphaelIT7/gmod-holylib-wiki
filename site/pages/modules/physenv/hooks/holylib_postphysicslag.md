<function name="HolyLib:PostPhysicsLag" parent="" type="hook">
	<description>
		Called after the physics simulation ended in which a physics lag was triggered.<br>
		Inside this hook you can safely change/modify the entities without having to worry about undefined behavior/crashes.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="simulationTime" type="number">How long the simulation already took.</arg>
	</args>
	<rets>
		<ret name="skipType" type="number" default="physenv.IVP_NoSkip"></ret>
	</rets>
</function>