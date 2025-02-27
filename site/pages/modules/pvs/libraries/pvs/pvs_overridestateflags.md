<function name="OverrideStateFlags" parent="pvs" type="libraryfunc">
	<description>
		Overrides the State flag for this Snapshot.
		<note>
			You should only use this inside the [SetupPlayerVisibility](https://wiki.facepunch.com/gmod/GM:SetupPlayerVisibility) hook.<br>
			Should be used inside the <page>HolyLib:PreCheckTransmit</page> or [SetupPlayerVisibility](https://wiki.facepunch.com/gmod/GM:SetupPlayerVisibility) hook as else it will affect the next transmit of any player!
		</note>
		<warning>
			Only use the `engine` argument if you know what your doing
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entity" type="Entity">the entity to add. Can also be a <page>table</page> and <page>EntityList</page> of entities</arg>
		<arg name="flag" type="number">the state flags to use</arg>
		<arg name="engine" type="boolean" default="false">If set to `true` you can override the edict flags themselfs instead of just the state flags</arg>
	</args>
</function>