<function name="UnPause" parent="systimer" type="libraryfunc">
	<description>
		Unpauses the given timer.
		Unlike systimer. Start this won't reset the time left until it executes again.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">name of timer</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>