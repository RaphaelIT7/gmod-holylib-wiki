<function name="HolyLib:PostEntityConstructor" parent="" type="hook">
	<description>
		Called before `CBaseEntity::PostConstructor` is called.<br>
		This should allow you to set the `EFL_SERVER_ONLY` flag properly allowing you to create serverside-only entities.
		<added version="0.6"></added>
		<changed version="0.8">
			The arguments and return values were changed, the entity is no longer given since it was never valid, and the return value now decides if the entity becomes server-side only or not.
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="className" type="string">The className of the Entity</arg>
	</args>
	<rets>
		<ret name="becomeServerOnly" type="boolean" default="false">`true` to make the entity a serveronly entity</ret>
	</rets>
</function>

<example>
	<description>Example usage of it for `light` entities possibly saving 1k edict slots for huge maps</description>
	<code>
hook.Add("HolyLib:PostEntityConstructor", "Example_ServerSide_Lights", function(class)
	if class == "light" then
		-- Return true makes these entities serverside only since they do not need networking at all
		-- This is because they use the lightstyle stringtable for networking / use the IVEngineServer::LightStyle binding
		return true 
	end
end)
	</code>
</example>