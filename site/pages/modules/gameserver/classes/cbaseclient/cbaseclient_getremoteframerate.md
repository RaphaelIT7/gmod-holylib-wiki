<function name="GetRemoteFramerate" parent="CBaseClient" type="classfunc">
	<description>
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="framerate" type="number"></ret>
		<ret name="deviation" type="number"></ret>
	</rets>
</function>
