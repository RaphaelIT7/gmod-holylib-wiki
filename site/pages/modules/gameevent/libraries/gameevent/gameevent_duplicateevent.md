<function name="DuplicateEvent" parent="gameevent" type="libraryfunc">
	<description>
		Duplicates the given event
	</description>
	<realm>Server</realm>
	<args>
		<arg name="event" type="IGameEvent">The gameevent to duplicate</arg>
	</args>
	<rets>
		<ret name="event" type="IGameEvent">A newly created copy of the given gameevent</ret>
	</rets>
</function>