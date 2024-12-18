<function name="SetPhysSkipType" parent="physenv" type="libraryfunc">
	<description>
		Sets the skiptype for the current simulation.
		This is reset after the simulation ended.
		<note>
			Only works on Linux32
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="IVP_SkipType" type="type"></arg>
	</args>
</function>