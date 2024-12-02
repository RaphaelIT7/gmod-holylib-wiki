<function name="EntityMessageBegin" parent="HolyLib" type="libraryfunc">
	<description>Allows you to create an entity message.<br>A direct engine bind to IVEngineServer::EntityMessageBegin</description>
	<source>https://github.com/danielga/sourcesdk-minimal/blob/master/public/igameevents.h#L95</source>
	<realm>Server</realm>
	<args>
		<arg name="ent" type="entity">entity to target</arg>
		<arg name="reliable" type="boolean">---</arg>
	</args>
	<note>
		If the bitbuf module is disabled, it will throw a lua error!
	</note>
</function>