<function name="CopyReadBuffer" parent="bitbuf" type="libraryfunc">
	<description>
		Copies the given buffer into a new one.<br>
		Useful if you want to save the data received by a client.
		<note>
			The size is clamped internally between a minimum of `4` bytes and a maximum of `262144` bytes.
		</note>
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="buffer" type="bf_read">buffer to copy</arg>
	</args>
	<rets>
		<ret name="newBuffer" type="bf_read">newly created copy</ret>
	</rets>
</function>