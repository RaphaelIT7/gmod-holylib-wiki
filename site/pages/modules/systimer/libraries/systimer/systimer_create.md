<function name="Create" parent="systimer" type="libraryfunc">
	<description>
		Creates a timer with the given name.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
		<arg name="delay" type="number">delay in seconds</arg>
		<arg name="reps" type="number"></arg>
		<arg name="callback" type="function"></arg>
	</args>
</function>