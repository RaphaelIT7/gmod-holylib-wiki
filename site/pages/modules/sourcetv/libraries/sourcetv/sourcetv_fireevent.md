<function name="FireEvent" parent="sourcetv" type="libraryfunc">
	<description>
		Fires the gameevent for all hltv clients / broadcasts it.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="event" type="number">event to fire</arg>
		<arg name="allowOverride" type="boolean" default="false">If `true`, it internally won't block any events like `hltv_cameraman`, `hltv_chase` and `hltv_fixed`.</arg>
	</args>
</function>