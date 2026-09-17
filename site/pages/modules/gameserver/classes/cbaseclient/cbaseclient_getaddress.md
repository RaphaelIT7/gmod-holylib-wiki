<function name="GetAddress" parent="CBaseClient" type="classfunc">
	<description>
		Returns the address as `ip:port`
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="address" type="string"></ret>
	</rets>
</function>
