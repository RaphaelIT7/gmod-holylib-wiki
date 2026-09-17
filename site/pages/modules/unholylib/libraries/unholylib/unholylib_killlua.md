<function name="KillLua" parent="unholylib" type="libraryfunc">
	<description>
		Calls the engine's internal `Lua::Kill` function, which forcibly shuts down/destroys the currently running Lua interface.
		<warning>
			This will kill the Lua state you're calling it from. The server will **not** recover from this and is likely to crash or become completely unusable. Only exists because why not.
		</warning>
		<added version="0.9"></added>
	</description>
	<unsafe version="0.9">
	<realm>Server</realm>
</function>
