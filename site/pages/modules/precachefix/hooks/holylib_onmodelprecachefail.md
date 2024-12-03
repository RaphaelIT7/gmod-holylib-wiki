<function name="HolyLib:OnModelPrecacheFail" parent="" type="hook">
	<description>
		Called when a model failed to precached.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="model" type="string">The model that failed to precache.</arg>
	</args>
	<rets>
		<ret name="fallback" type="number" default="nil">Return a fallback index. If nothing is given it will use <page>precache_modelfallback</page></ret>
	</rets>
</function>