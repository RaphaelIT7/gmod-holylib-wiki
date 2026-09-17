<function name="GetFreeClient" parent="gameserver" type="libraryfunc">
	<description>
		Finds (or creates) a free client slot for the given address, this is the same lookup the engine performs internally whenever a new player connects.<br>
		<note>
			Calling this function will **not** trigger the <page>HolyLib:GetFreeClient</page> hook, to prevent infinite recursion.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ip" type="string">The address to look up / assign the free client for. Format `ip:port`</arg>
		<arg name="useDNS" type="boolean">If `true` it will try to resolve the IP</arg>
		<arg name="noQueueLookup" type="boolean" default="false">If `true`, HolyLib's queue client fallback (see <page>gameserver.GetFreeQueueClient</page>) is skipped when the engine has no regular free client left</arg>
	</args>
	<rets>
		<ret name="client" type="CGameClient">The found/created free client or `nil` on failure</ret>
	</rets>
</function>