<function name="SetLagThreshold" parent="physenv" type="libraryfunc">
	<description>
		The lag threshold which, if exceeded, triggers the `HolyLib:PhysicsLag` hook.
		<note>
			Only works on Linux32
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ms" type="number">Lag threshold in milliseconds (10^-3)</arg>
	</args>
</function>