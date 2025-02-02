<function name="HasQueuedPackets" parent="CBaseClient" type="classfunc">
	<description>
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="queuedPackets" type="number"></ret>
	</rets>
</function>