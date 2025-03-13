<function name="HolyLib:OnNotifyClientConnect" parent="" type="hook">
	<description>
		Called when a client wants to authenticate through steam.
		<warning>
			The steamID64 may be spoofed, so don't rely on it!
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="nextUserID" type="number">The userID the client would receive after authenticating</arg>
		<arg name="ipAddress" type="string">The IP address of the client</arg>
		<arg name="steamID64" type="number">The SteamID64 the client sent</arg>
	</args>
</function>