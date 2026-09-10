<function name="CreateInterface" parent="luathreads" type="libraryfunc">
	<description>
		Creates a new, independent Lua interface.<br>
		It won't run on its own thread until <page>LuaInterface:EnableThinking</page> is called, or <page>LuaInterface:RunTasks</page> is used to run its queued tasks on HolyLib's thread pool instead.
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="interface" type="LuaInterface">The newly created interface</ret>
	</rets>
</function>