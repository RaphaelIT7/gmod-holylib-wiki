<function name="CheckAreasConnected" parent="pvs" type="libraryfunc">
	<description>
		Returns whether or not the given areas are connected.<br>
		Direct bind to `IVEngineServer::CheckAreasConnected`
		<note>
			We don't validate if you pass valid areas!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="area1" type="number">Area 1</arg>
		<arg name="area2" type="number">Area 2</arg>
	</args>
	<rets>
		<ret name="connected" type="boolean">`true` if they are connected</ret>
	</rets>
</function>