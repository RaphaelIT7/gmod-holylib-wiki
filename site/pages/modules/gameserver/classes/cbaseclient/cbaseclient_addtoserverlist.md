<function name="AddToServerList" parent="CBaseClient" type="classfunc">
	<description>
		Adds the client to the server's client list and removes it from the internal queue client list.
		<note>
			Does nothing if there is currently no active server.<br>
			Throws an error if the client is a `HLTV` client.
		</note>
		<added version="0.9"></added>
	</description>
	<realm>Server</realm>
</function>
