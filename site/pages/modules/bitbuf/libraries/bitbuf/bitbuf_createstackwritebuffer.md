<function name="CreateStackWriteBuffer" parent="bitbuf" type="libraryfunc">
	<description>
		Create a write buffer with the given size or with the given data allocated on the stack making it faster.<br>
		<warning>
			The buffer will be stack allocated, do NOT call this function recursively and the buffer is **only** valid inside the callback function.<br>
			This is because you could cause a crash if you were to create too many stack allocated buffers!<br>
		</warning>
		<note>
			The size is clamped internally between a minimum of `4` bytes and a maximum of `65536` bytes on Linux and to `8192` on Windows.
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="data" type="string|number">string to created the buffer from or a number as size</arg>
		<arg name="callback" type="function">
			the callback inside which you can use the buffer, the buffer will become invalid once the call is over!
			<callback>
				<arg name="bf" type="bf_write">the buffer</arg>
			</callback>
		</arg>
	</args>
</function>