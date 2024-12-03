<function name="MessageEnd" parent="HolyLib" type="libraryfunc">
	<description>
		Finishes the active Entity/Usermessage started by <page>holylib_entitymessagebegin</page> or <page>holylib_usermessagebegin</page>.<br>
		If you don't call this, the message won't be sent! (And the engine might throw a tantrum).<br>
		A direct engine bind to `IVEngineServer::MessageEnd`
	</description>
	<realm>Server</realm>
</function>