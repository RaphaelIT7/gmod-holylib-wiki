<function name="EnablePostTransmitHook" parent="pvs" type="libraryfunc">
	<description>
		Enables or disables the <page>HolyLib:PostCheckTransmit</page> hook from being called.
		<note>
			This is disabled by default and reset back to disabled on every map change, since calling a Lua hook on every transmit check has a performance cost.<br>
			Only enable this if you actually use <page>HolyLib:PostCheckTransmit</page>.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="enable" type="boolean">Whether the <page>HolyLib:PostCheckTransmit</page> hook should be called.</arg>
	</args>
</function>