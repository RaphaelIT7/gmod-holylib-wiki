<function name="GetAvgLoss" parent="CBaseClient" type="classfunc">
	<description>
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="flow" type="number">the flow to get the data from</arg>
	</args>
	<rets>
		<ret name="avgLoss" type="number"></ret>
	</rets>
</function>
