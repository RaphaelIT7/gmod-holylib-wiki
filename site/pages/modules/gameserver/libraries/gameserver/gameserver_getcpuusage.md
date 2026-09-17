<function name="GetCPUUsage" parent="gameserver" type="libraryfunc">
	<description>
		Returns the server's current CPU usage as tracked by the engine itself (`CBaseServer::GetCPUUsage`).
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="cpuUsage" type="number">The CPU usage</ret>
	</rets>
</function>