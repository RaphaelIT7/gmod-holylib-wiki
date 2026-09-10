<function name="RunString" parent="LuaInterface" type="classfunc">
	<description>
		Queues the given code to be run inside this interface.<br>
		The code only actually runs once this interface's tasks are executed, either by its own thread (See <page>LuaInterface:EnableThinking</page>) or thru <page>LuaInterface:RunTasks</page>.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="code" type="string">The code to run</arg>
	</args>
</function>