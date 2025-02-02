<function name="Transmit" parent="CBaseClient" type="classfunc">
	<description>
		Transmit any pending data to the client.<br>
		Returns `true` on success.
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>