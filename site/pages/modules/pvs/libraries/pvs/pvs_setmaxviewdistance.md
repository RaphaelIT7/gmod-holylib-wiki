<function name="SetMaxViewDistance" parent="pvs" type="libraryfunc">
	<description>
		Sets the maximum distance at which entities are transmitted for the current transmit check.
		<note>
			This function requires the `networking` module to be enabled.<br>
			Only use this function inside the <page>HolyLib:PreCheckTransmit</page> hook or the [SetupPlayerVisibility](https://wiki.facepunch.com/gmod/GM:SetupPlayerVisibility) hook.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="distance" type="number">The new max view distance to use.</arg>
	</args>
</function>