<function name="GetArea" parent="pvs" type="libraryfunc">
	<description>
		Returns the number of clusters that exist.<br>
		Direct bind to `IVEngineServer::GetArea`
		<added version="0.2"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="pos" type="Vector">position to get the area from</arg>
	</args>
	<rets>
		<ret name="area" type="number">the area id</ret>
	</rets>
</function>