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
		<arg name="authResult" type="number">
			The steam auth result

			| Status | Description |
			|-------|------|
			| `0` | Ticket is valid for this game and this steamID |
			| `1` | Ticket is not valid |
			| `2` | A ticket has already been submitted for this steamID |
			| `3` | Ticket is from an incompatible interface version |
			| `4` | Ticket is not for this game |
			| `5` | Ticket has expired |

		</arg>
	</args>
	<rets>
		<ret name="override" type="boolean" default="nil">
			Return `true` to forcefully authenticate his steamid.  
			Return `false` to block his authentication.  
			Return nothing to let the server normally handle it.  
		</ret>
	</rets>
</function>