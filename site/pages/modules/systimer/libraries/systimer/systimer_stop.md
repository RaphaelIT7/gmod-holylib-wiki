<function name="Start" parent="systimer" type="libraryfunc">
	<description>
		Returns `true` if the given timer was successfully stopped.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the given timer was successfully stopped.</ret>
	</rets>
</function>