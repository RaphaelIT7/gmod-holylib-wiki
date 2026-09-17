<function name="CreateFakeQueueClient" parent="gameserver" type="libraryfunc">
	<description>
		Creates a new fake client with the given name, similar to <page>gameserver.CreateFakeClient</page>, but manually replicates the connection process instead of going through the engine's `sv_stressbots`-based fake client creation.<br>
		It sets a bunch of default user convars (`rate`, `cl_updaterate`, `cl_interp`, ...) and puts the client into the `SIGNONSTATE_PRESPAWN` state before returning it.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">The name to give the fake client</arg>
	</args>
	<rets>
		<ret name="client" type="CGameClient">The created fake client or `nil` if the server isn't active or no free client slot was found</ret>
	</rets>
</function>