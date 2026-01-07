<function name="ForceFullUpdate" parent="pvs" type="libraryfunc">
	<description>
		Forces a full update for the specific client.
		<added version="0.7"></added>
		<changed version="0.8">
			The `ply` argument was changed from previously accepting only <page>Player</page> to now accepting all <page>ClientArg</page>
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="ClientArg">player to force the full update on</arg>
	</args>
</function>