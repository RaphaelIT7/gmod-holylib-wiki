<function name="Adjust" parent="systimer" type="libraryfunc">
	<description>
		Adjusts the timer with the given name with the new values.<br>
		Returns `true` if the timer was successfully adjusted.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
		<arg name="delay" type="number">delay in seconds</arg>
		<arg name="reps = nil" type="number"></arg>
		<arg name="callback = nil" type="function"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>