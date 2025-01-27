<function name="CreateReadBuffer" parent="bitbuf" type="libraryfunc">
	<description>
		Creates a read buffer from the given data.<br>
		Useful if you want to read the userdata of the instancebaseline stringtable.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="string">string to created the buffer on</arg>
	</args>
	<rets>
		<ret name="buffer" type="bf_read">created buffer containing the given string as data</ret>
	</rets>
</function>