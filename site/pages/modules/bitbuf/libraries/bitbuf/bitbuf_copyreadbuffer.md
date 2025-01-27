<function name="CopyReadBuffer" parent="bitbuf" type="libraryfunc">
	<description>
		Copies the given buffer into a new one.<br>
		Useful if you want to save the data received by a client.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="buffer" type="bf_read">buffer to copy</arg>
	</args>
	<rets>
		<ret name="newBuffer" type="bf_read">newly created copy</ret>
	</rets>
</function>