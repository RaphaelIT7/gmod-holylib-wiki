<function name="Pause" parent="systimer" type="libraryfunc">
	<description>
		Returns true if the given timer was successfully paused.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns whether the timer was paused successfully or not.</ret>
	</rets>
</function>