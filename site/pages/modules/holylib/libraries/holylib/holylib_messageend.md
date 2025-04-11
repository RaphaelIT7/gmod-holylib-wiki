<function name="MessageEnd" parent="HolyLib" type="libraryfunc">
	<description>
		Finishes the active Entity/Usermessage started by <page>HolyLib.EntityMessageBegin</page> or <page>HolyLib.UserMessageBegin</page>.<br>
		If you don't call this, the message won't be sent! (And the engine might throw a tantrum).<br>
		A direct engine bind to `IVEngineServer::MessageEnd`
		<added version="0.5"></added>
	</description>
	<realm>Server</realm>
</function>