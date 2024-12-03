<function name="ServerExecute" parent="HolyLib" type="libraryfunc">
	<description>
		Forces all queried commands to be executed/processed.<br>
		A direct engine bind to `IVEngineServer::ServerExecute`
		<note>
			This function won't work if it's already active.<br>
			This means that using it inside a concommand callback will do nothing.
		</note>
	</description>
	<realm>Server</realm>
</function>

<example>
	<description>Example usage of this function showing how it executes all queried commands</description>
	<code>
concommand.Add("example", function()
	print("Hello World")
end)

RunConsoleCommand("example")
HolyLib.ServerExecute()

print("Finished")
	</code>
	<output>
Hello World
Finished
	</output>
</example>