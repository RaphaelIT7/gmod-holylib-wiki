<function name="IsInvalid" parent="CBaseClient" type="classfunc">
	<description>
		Returns `true` if the client is invalid.<br>
		Unlike <page>CBaseClient:IsValid</page>, which obeys `gameserver_rawclients`, this function always reflects whether the underlying client pointer is truly invalid.
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="invalid" type="boolean"></ret>
	</rets>
</function>
