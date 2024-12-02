<function name="UserMessageBegin" parent="HolyLib" type="libraryfunc">
	<description>
		Allows you to create any registered usermessage.<br>
		A direct engine bind to IVEngineServer::UserMessageBegin
		<note>
			If the bitbuf module is disabled, it will throw a lua error!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="filter" type="IRecipentFilter">---</arg>
		<arg name="usermsg" type="string">usermessage</arg>
	</args>
</function>