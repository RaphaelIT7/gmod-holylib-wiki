<function name="Put" parent="HttpServer" type="classfunc">
	<description>
		Adds the given Put path to the HttpServer.
		<added version="0.7"></added>
		<changed version="0.8">The `response` argument inside the callback was removed as all <page>HttpResponse</page> functions were merged into the <page>HttpRequest</page></changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="path" type="string">the path to add</arg>
		<arg name="callback" type="function">
			the callback is called when a new request is received.
			<callback>
				<arg name="request" type="HttpRequest">The incoming request</arg>
			</callback>
		</arg>
		<arg name="ipWhitelist" type="boolean" default="false">
			`true` to enable the IP whitelist<br>
			only requests sent by connected players are processed.
		</arg>
	</args>
</function>