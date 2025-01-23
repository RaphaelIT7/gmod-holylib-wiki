<function name="StartRecord" parent="sourcetv" type="libraryfunc">
	<description>
		Tries to start a new recording.<br>
		Returns one of the `RECORD_` enums.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">the file name for the recording</arg>
	</args>
	<rets>
		<ret name="status" type="number"></ret>
	</rets>
</function>