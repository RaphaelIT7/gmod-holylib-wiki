<function name="HolyLib:OnLuaRunString" parent="" type="hook">
	<description>
		Called when Lua code is about to be loaded and executed.<br>
		This allows you to modify the code that will be executed,<br>
		for example you can change the code and then return the new code which will be used instead.<br>
		If you return a bool, then false means the code failed to be executed, and true means the code was executed.<br>
		This is useful when you handle execution yourself - though if you want to let code silently fail just return true without executing code.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="code" type="string"></arg>
		<arg name="filePath" type="string"></arg>
		<arg name="gamePath" type="string"></arg>
	</args>
	<rets>
		<ret name="executed/code" type="boolean|string"></ret>
	</rets>
</function>