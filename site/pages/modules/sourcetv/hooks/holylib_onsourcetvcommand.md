<function name="HolyLib:OnSourceTVCommand" parent="" type="hook">
	<description>
		Called when a CHLTVClient sends a command.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="client" type="CHLTVClient">client that sent the command</arg>
		<arg name="command" type="string">the executed command</arg>
		<arg name="args" type="table">table containing all arguments</arg>
		<arg name="argString" type="string">arguments as a single string</arg>
	</args>
	<rets>
		<ret name="handled" type="boolean">Return `true` if the command as handled in lua</ret>
	</rets>
</function>

<example>
	<description></description>
	<code>
hook.Add("HolyLib:OnSourceTVCommand", "Example", function(client, name, args, argString)
	if name == "Example" then
		client:ClientPrint("Hello World from HLTVServer\n")
		return true
	end
end)
	</code>
	<output>
	</output>
</example>