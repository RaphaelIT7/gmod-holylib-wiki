<function name="GetName" parent="gameserver" type="libraryfunc">
	<description>
		Returns the current server/host name.<br>
		Should be the same as `GetConVar("hostname"):GetString()`
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="name" type="string"></ret>
	</rets>
</function>