<function name="EntityMessageBegin" parent="HolyLib" type="libraryfunc">
	<description>
		Allows you to create an entity message.<br>
		A direct engine bind to IVEngineServer::EntityMessageBegin
		<note>
			If the bitbuf module is disabled, it will throw a lua error!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ent" type="Entity">entity to target</arg>
		<arg name="reliable" type="boolean">---</arg>
	</args>
</function>