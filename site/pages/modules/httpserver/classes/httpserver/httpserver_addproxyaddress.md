<function name="AddProxyAddress" parent="HttpServer" type="classfunc">
	<description>
		Registers the given proxyAddress to be recognized, in which case it will look for the given header name and use it as the real address of the request sender.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="proxyAddress" type="string"></arg>
		<arg name="headerName" type="string"></arg>
		<arg name="useSecondAddress" type="boolean" default="false">If the given header provides two addresses seperated by a `,` it will use the second address. (proxies love to be funny. Now give me my Address!)</arg>
	</args>
</function>

<example>
	<code>
local ip = game.GetIPAddress()
ip = ip:sub(0, ip:find(":") - 1) -- remove the port from the address

randomHttpServer:AddProxyAddress(ip, "X-Real-IP") -- This is an example where an nginx proxy running on the same host would pass a request to the http server with the X-Real-IP header being the client address
	</code>
</example>