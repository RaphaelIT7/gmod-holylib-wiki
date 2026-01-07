<function name="SendEmptyData" parent="voicechat" type="libraryfunc">
	<description>
		Sends a empty voice data to the given client.
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg">The Player to send the Voice Data to.</arg>
		<arg name="plySlot" type="number" default="ply:EntIndex() - 1">The Player slot that should be used in the voice data. Defaults to the given player</arg>
	</args>
</function>