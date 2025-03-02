<function name="GetAll" parent="httpserver" type="libraryfunc">
	<description>
		Returns a table containing all existing HttpServer in case you lose a reference.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="httpServers" type="table">A table containing all existing HttpServers</ret>
	</rets>
</function>