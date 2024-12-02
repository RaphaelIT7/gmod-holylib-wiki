<function name="InvalidateBoneCache" parent="HolyLib" type="libraryfunc">
	<description>
		Invalidates the bone cache of the given entity.
		<note>
			Only uses this on Entities that are Animated / Inherit the CBaseAnimating class or else it will throw a Lua error.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ent" type="Entity">Entity to target</arg>
	</args>
</function>