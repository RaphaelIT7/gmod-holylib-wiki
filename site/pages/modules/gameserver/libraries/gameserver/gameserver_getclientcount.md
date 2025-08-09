<function name="GetClientCount" parent="gameserver" type="libraryfunc">
	<description>
		returns client count for iteration of <page>gameserver.GetClient</page><br>

		<note>
			This will include inactive <page>CGameClient</page>'s since the engine re-uses them and doesn't delete them on disconnect.<br>
			If you want to get the count of active client's use <page>gameserver.GetNumClients()</page>
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="clients" type="number"></ret>
	</rets>
</function>