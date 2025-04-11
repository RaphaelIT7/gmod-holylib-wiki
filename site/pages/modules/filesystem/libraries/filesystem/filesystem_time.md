<function name="Time" parent="filesystem" type="libraryfunc">
	<description>
		Returns the time when the given file was last modified in unix time.
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">the file to use</arg>
		<arg name="gamePath" type="string" default="GAME">game path to use</arg>
	</args>
	<rets>
		<ret name="time" type="number">Returns the time or `0` on failure</ret>
	</rets>
</function>