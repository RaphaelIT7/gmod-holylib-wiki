<function name="FindByName" parent="httpserver" type="libraryfunc">
	<description>
		Returns the HttpServer with the given name set by <page>HttpServer:SetName</page> or returns `nil` on failure.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="httpServer" type="HttpServer">Found HttpServer or `nil`</ret>
	</rets>
</function>