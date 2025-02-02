<function name="GetStreamUnreliable" parent="CBaseClient" type="classfunc">
	<description>
		Returns the unreliable stream used by net messages.
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="stream" type="bf_write"></ret>
	</rets>
</function>