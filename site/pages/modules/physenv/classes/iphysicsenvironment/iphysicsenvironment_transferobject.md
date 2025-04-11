<function name="TransferObject" parent="IPhysicsEnvironment" type="classfunc">
	<description>
		Transfers the physics object from this environment to the new environment.
		<warning>
			You shouldn't transfer players or vehicles.<br>
			It currently is quite buggy and shouldn't really be used.
		</warning>
		<added version="0.7"></added>
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