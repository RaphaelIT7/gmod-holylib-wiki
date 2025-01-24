<function name="Get" parent="HttpServer" type="classfunc">
	<description>
		Adds the given Get path to the HttpServer.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="path" type="string">the path to add</arg>
		<arg name="callback" type="function">
			the callback is called when a new request is received.
			<callback>
				<arg name="request" type="HttpRequest">The incoming request</arg>
				<arg name="response" type="HttpResponse">The respone to use</arg>
			</callback>
		</arg>
		<arg name="ipWhitelist" type="boolean" default="false">
			`true` to enable the IP whitelist<br>
			only requests sent by connected players are processed.
		</arg>
	</args>
</function>