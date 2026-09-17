<function name="CreateNewClient" parent="gameserver" type="libraryfunc">
	<description>
		Creates and returns a brand new <page>CGameClient</page> appended to the end of the server's client list (at slot <page>gameserver.GetClientCount</page>).<br>
		Unlike <page>gameserver.CreateFakeClient</page> this does not connect the client or configure it as a bot, it merely allocates the client object.
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="client" type="CGameClient">The newly created client, or `nil` if the server isn't active</ret>
	</rets>
</function>