<function name="GetPVSForCluster" parent="pvs" type="libraryfunc">
	<description>
		Sets the current PVS to that of the given cluster.
		<note>
			We don't validate if you pass valid clusters!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="cluster" type="number">cluster to get the pvs from</arg>
	</args>
</function>