<function name="SetSteamID" parent="CBaseClient" type="classfunc">
	<description>
		Sets the SteamID of the client.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="steamID64" type="string">the new steamID64 to set</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">returns `true` on success</ret>
	</rets>
</function>