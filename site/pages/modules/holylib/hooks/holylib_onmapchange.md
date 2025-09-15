<function name="HolyLib:OnMapChange" parent="" type="hook">
	<description>
		Called right before a level transition occurs, this hook allows you to react to map changes initiated via changelevel.
		<added version="0.8">
		</added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="levelName" type="string">The name of the next map</arg>
		<arg name="langmarkName" type="string">The name of the landmark the players would spawn at. Can be an empty string.</arg>
	</args>
</function>