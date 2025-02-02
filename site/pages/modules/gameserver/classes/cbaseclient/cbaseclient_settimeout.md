<function name="SetTimeout" parent="CBaseClient" type="classfunc">
	<description>
		Sets the time in seconds before the client is marked as timing out.
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="seconds" type="number"></arg>
	</args>
</function>