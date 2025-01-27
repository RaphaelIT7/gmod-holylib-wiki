<function name="SendLua" parent="CBaseClient" type="classfunc">
	<description>
		Sends the given code to the client to be executed.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="code" type="string"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` on success.</ret>
	</rets>
</function>