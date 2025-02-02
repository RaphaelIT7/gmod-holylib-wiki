<function name="GetStreamVoice" parent="CBaseClient" type="classfunc">
	<description>
		Returns the voice stream used by the voice chat.
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