<function name="CreateFakeClient" parent="gameserver" type="libraryfunc">
	<description>
		Creates a new fake client (bot) with the given name and adds it to the server.<br>
		Returns `nil` if the server isn't active or the engine failed to create the client (e.g. no free client slot left).
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">The name to give the fake client</arg>
	</args>
	<rets>
		<ret name="client" type="CGameClient">The created fake client or `nil` on failure</ret>
	</rets>
</function>