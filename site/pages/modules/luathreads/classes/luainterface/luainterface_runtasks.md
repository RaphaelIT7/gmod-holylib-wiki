<function name="RunTasks" parent="LuaInterface" type="classfunc">
	<description>
		Queues this interface's pending tasks to run once on HolyLib's <page>holylib_luathreads_threadpool</page> thread pool.<br>
		<note>
			Does nothing if the interface already has its own dedicated thread running. (See <page>LuaInterface:EnableThinking</page>)
		</note>
	</description>
	<realm>Server</realm>
</function>