<function name="GetClusterForOrigin" parent="pvs" type="libraryfunc">
	<description>
		Returns the number of clusters that exist.<br>
		Direct bind to `IVEngineServer::GetClusterForOrigin`
	</description>
	<realm>Server</realm>
	<args>
		<arg name="pos" type="Vector">position to get the cluster from</arg>
	</args>
	<rets>
		<ret name="cluster" type="number">the cluster id</ret>
	</rets>
</function>