<function name="HolyLib:PostEntityConstructor" parent="" type="hook">
	<description>
		Called before `CBaseEntity::PostConstructor` is called.<br>
		This should allow you to set the `EFL_SERVER_ONLY` flag properly allowing you to create serverside-only entities.
		<added version="0.6"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ent" type="Entity">The Entity that is being created</arg>
		<arg name="className" type="string">The className of the Entity</arg>
	</args>
</function>