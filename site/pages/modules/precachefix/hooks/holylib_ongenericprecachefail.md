<function name="HolyLib:OnGenericPrecacheFail" parent="" type="hook">
	<description>
		Called when a generic(model, sound, ...) failed to precached.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="generic" type="string">The generic that failed to precache.</arg>
	</args>
	<rets>
		<ret name="fallback" type="number" default="nil">Return a fallback index. If nothing is given it will use <page>precache_genericfallback</page></ret>
	</rets>
</function>