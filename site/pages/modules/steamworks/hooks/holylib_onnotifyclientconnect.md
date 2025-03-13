<function name="HolyLib:OnNotifyClientConnect" parent="" type="hook">
	<description>
		Called when a client wants to authenticate through steam.
		<warning>
			The steamID64 may be spoofed, so don't rely on it!
		</warning>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="nextUserID" type="number">The userID the client would receive after authenticating</arg>
		<arg name="ipAddress" type="string">The IP address of the client</arg>
		<arg name="steamID64" type="string">The SteamID64 the client sent</arg>
	</args>
	<rets>
		<ret name="override" type="boolean" default="nil">
			Return `true` to forcefully authenticate his steamid.  
			Return `false` to block his authentication.  
			Return nothing to let the server normally handle it.  
		</ret>
	</rets>
</function>