<function name="SendEmptyData" parent="voicechat" type="libraryfunc">
	<description>
		Sends a empty voice data to the given client.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player to send the Voice Data to.</arg>
		<arg name="plySlot" type="number" default="ply:EntIndex() - 1">The Player slot that should be used in the voice data. Defaults to the given player</arg>
	</args>
</function>