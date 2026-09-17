<function name="ForceWeaponTransmit" parent="pvs" type="libraryfunc">
	<description>
		Forces the given weapon entity to always be transmitted, regardless of the usual weapon transmission rules.
		<note>
			This function requires the `networking` module to be enabled.<br>
			If the given entity isn't a weapon, this function simply has no effect.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="weapon" type="Entity">The weapon entity to force transmit for.</arg>
		<arg name="forcetransmit" type="boolean">Whether the weapon should always be transmitted.</arg>
	</args>
</function>