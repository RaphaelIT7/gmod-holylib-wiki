<function name="EnableThinking" parent="LuaInterface" type="classfunc">
	<description>
		Enables or disables this interface's own dedicated thread.<br>
		While enabled, the interface will continuously run its queued tasks on its own thread, instead of needing <page>LuaInterface:RunTasks</page> to be called manually.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="enable" type="boolean">`true` to create and start the thread, `false` to stop and destroy it</arg>
	</args>
</function>