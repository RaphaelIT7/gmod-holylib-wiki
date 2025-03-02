<function name="GetClient" parent="HttpRequest" type="classfunc">
	<description>
		Returns the client who sent the HTTP Request or NULL if it didn't find it.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="client" type="CBaseClient">Found <page>CBaseClient</page> or a NULL client.</ret>
	</rets>
</function>