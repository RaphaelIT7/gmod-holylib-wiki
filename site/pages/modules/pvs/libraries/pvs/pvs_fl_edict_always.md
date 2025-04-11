<function name="FL_EDICT_ALWAYS" parent="pvs" type="libraryfield">
	<description>
		The Entity will always be networked and ignore the PVS.<br>
		Used by <page>pvs.OverrideStateFlags</page>,  <page>pvs.GetStateFlags</page> and <page>pvs.SetStateFlags</page>.
		<added version="0.2"></added>
		<changed version="0.7">
			Changed value from `4` to `2`
		</changed>
	</description>
	<value>2</value>
	<realm>Server</realm>
</function>