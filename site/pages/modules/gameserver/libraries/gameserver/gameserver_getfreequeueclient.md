<function name="GetFreeQueueClient" parent="gameserver" type="libraryfunc">
	<description>
		Directly looks up (or creates) a free client from HolyLib's internal queue client list for the given address.<br>
		This is the same fallback that <page>gameserver.GetFreeClient</page> (and the engine's own free client search) uses when the server has no regular free client slot left.<br>
		Queue clients are kept out of the server's normal client list (see <page>CBaseClient:AddToQueueList</page>) until moved back in.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ip" type="string">The address to look up / assign the free queue client for. Format `ip:port`</arg>
		<arg name="useDNS" type="boolean">If `true` it will try to resolve the IP</arg>
	</args>
	<rets>
		<ret name="client" type="CGameClient">The found/created free queue client, or `nil` if none could be created (e.g. <page>holylib_gameserver_maxplayers</page> was reached)</ret>
	</rets>
</function>