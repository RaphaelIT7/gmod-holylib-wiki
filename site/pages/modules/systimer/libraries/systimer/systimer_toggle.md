<function name="Toggle" parent="systimer" type="libraryfunc">
	<description>
		Toggles the given timer.
		Returns true if the timer was activated/started again.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns whether the timer was restarted or stopped.</ret>
	</rets>
</function>