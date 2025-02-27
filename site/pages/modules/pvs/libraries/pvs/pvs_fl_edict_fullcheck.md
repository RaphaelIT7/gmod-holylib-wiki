<function name="FL_EDICT_FULLCHECK" parent="pvs" type="libraryfield">
	<description>
		Calls the Entity's `ShouldTransmit` function to receive a new FL_EDICT flag for networking.<br>
		Used by <page>pvs.OverrideStateFlags</page>,  <page>pvs.GetStateFlags</page> and <page>pvs.SetStateFlags</page>.
		<changed version="0.7">
			Changed value from `16` to `8`
		</changed>
	</description>
	<value>8</value>
	<realm>Server</realm>
</function>