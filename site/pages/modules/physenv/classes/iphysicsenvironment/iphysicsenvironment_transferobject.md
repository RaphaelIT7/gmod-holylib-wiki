<function name="TransferObject" parent="IPhysicsEnvironment" type="classfunc">
	<description>
		Transfers the physics object from this environment to the new environment.
		<warning>
			You shouldn't transfer players or vehicles.
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="obj" type="IPhysicsObject"></arg>
		<arg name="newEnvironment" type="IPhysicsEnvironment"></arg>
	</args>
	<rets>
		<ret name="" type="boolean"></ret>
	</rets>
</function>