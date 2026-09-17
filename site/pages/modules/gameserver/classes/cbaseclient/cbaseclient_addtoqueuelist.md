<function name="AddToQueueList" parent="CBaseClient" type="classfunc">
	<description>
		Removes the client from the server's client list and adds it to the internal queue client list.
		<note>
			Does nothing if there is currently no active server.<br>
			Throws an error if the client is a `HLTV` client.
		</note>
		<added version="0.9"></added>
	</description>
	<realm>Server</realm>
</function>
