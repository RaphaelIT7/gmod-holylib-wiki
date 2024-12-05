<function name="Start" parent="systimer" type="libraryfunc">
	<description>
		Returns `true` if the given timer was successfully started again.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns if timer has been restarted successfully.</ret>
	</rets>
</function>