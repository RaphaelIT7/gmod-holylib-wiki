<function name="TimeLeft" parent="systimer" type="libraryfunc">
	<description>
		Returns the time left until the given timer is executed again.
		Returns `0` if the timer wasn't found.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
	</args>
	<rets>
		<ret name="" type="number">Time remaining in seconds.</ret>
	</rets>
</function>