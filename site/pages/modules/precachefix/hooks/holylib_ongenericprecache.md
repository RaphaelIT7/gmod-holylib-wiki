<function name="HolyLib:OnGenericPrecache" parent="" type="hook">
	<description>
		Called when a generic(model, sound, ...) was successfully precached.
		<added version="0.3"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="generic" type="string">The generic that was precached.</arg>
		<arg name="index" type="number">The index that was assigned.</arg>
	</args>
</function>