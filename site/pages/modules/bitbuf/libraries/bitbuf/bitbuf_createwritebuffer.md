<function name="CreateWriteBuffer" parent="bitbuf" type="libraryfunc">
	<description>
		Copies the given buffer into a new one.  
		Useful if you want to save the data received by a client. 
		<note>
			The size is clamped internally between a minimum of `4` bytes and a maximum of `262144` bytes.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="size" type="number">
			buffer size in bytes to allocate.<br>
			**Can** be given a string as data.
		</arg>
	</args>
	<rets>
		<ret name="buffer" type="bf_write">newly created buffer</ret>
	</rets>
</function>