<function name="HolyLib:OnModelPrecache" parent="" type="hook">
	<description>
		Called when a model was successfully precached.
		<added version="0.3"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="model" type="string">The model that was precached.</arg>
		<arg name="index" type="number">The index that was assigned.</arg>
	</args>
</function>