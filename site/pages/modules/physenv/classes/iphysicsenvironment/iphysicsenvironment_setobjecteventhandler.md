<function name="SetObjectEventHandler" parent="IPhysicsEnvironment" type="classfunc">
	<description>
		Allows you to add callbacks when physics objects wake up or go to sleep in the environment.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="onObjectWake(IPhysicsObject obj)" type="function"></arg>
		<arg name="onObjectSleep(IPhysicsObject obj)" type="function"></arg>
	</args>
	<rets>
	</rets>
</function>