<function name="Start" parent="HttpServer" type="classfunc">
	<description>
		This will start or restart the HTTP Server, and it will listen on the given address + port.
		<note>
			If a Method function like <page>HttpServer:Get</page> was called after this was called, you need to call this function again!
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="address" type="string">address to listen on</arg>
		<arg name="port" type="number">port to listen on</arg>
	</args>
</function>