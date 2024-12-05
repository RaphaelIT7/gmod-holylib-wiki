<function name="Adjust" parent="systimer" type="libraryfunc">
	<description>
		Returns the number of reps left for the given timer.<br>
		Returns `0` if the timer wasn't found or the reps are below `0`.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
	</args>
	<rets>
		<ret name="" type="number">Returns `0` if the timer wasn't found or the reps are below `0`.</ret>
	</rets>
</function>