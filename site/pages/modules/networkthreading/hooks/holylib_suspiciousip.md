<function name="HolyLib:SuspiciousIP" parent="" type="hook">
	<description>
		Called for every connected IP address that was flagged as suspicious during this process, right before its suspicion counters get reset.<br>
		An address is flagged once it either sent more than 100 suspicious/garbage packets or more than 10000 valid packets within a single process.
		<added version="0.9"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="address" type="string">The IP address (including the port, e.g. `xxx.xxx.xxx.xxx:pppp`) that was flagged</arg>
		<arg name="tooManySuspiciousPackets" type="boolean">`true` if the address was flagged for sending too many suspicious/garbage packets</arg>
		<arg name="tooManyValidPackets" type="boolean">`true` if the address was flagged for sending too many valid packets</arg>
	</args>
</function>
