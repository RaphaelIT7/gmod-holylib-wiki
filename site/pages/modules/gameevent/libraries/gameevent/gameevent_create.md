<function name="Create" parent="gameevent" type="libraryfunc">
	<description>
		Creates the given gameevent and returns it.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="gameevent" type="string">The gameevent to create.</arg>
		<arg name="force" type="boolean" default="false">If `true` it will force the creation of the gameevent.</arg>
	</args>
	<rets>
		<ret name="event" type="IGameEvent">The newly created event. Can be `nil` on failure.</ret>
	</rets>
</function>