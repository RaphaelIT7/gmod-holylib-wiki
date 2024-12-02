<function name="InvalidateBoneCache" parent="HolyLib" type="libraryfunc">
	<description>
		Invalidates the bone cache of the given entity.
		<note>
			Only uses this on Entities that are Animated / Inherit the CBaseAnimating class or else it will throw a Lua error.
		</note>
	</description>
	<source>https://github.com/danielga/sourcesdk-minimal/blob/master/public/igameevents.h#L95</source>
	<realm>Server</realm>
	<args>
		<arg name="ent" type="Entity">Entity to target</arg>
	</args>
</function>