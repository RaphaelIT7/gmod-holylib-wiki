<function name="SendConnectionlessPacket" parent="gameserver" type="libraryfunc">
	<description>
		Sends out a connectionless packet to the target ip.<br>
		See <page>HolyLib:ProcessConnectionlessPacket</page> for examples.
		<note>
			It's expected that **YOU** already added the connectionless header, this was done to not have to copy the buffer.<br>
			`bf:WriteLong(-1) -- Write this as the first thing. This is the CONNECTIONLESS_HEADER`
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="bf" type="bf_write">The buffer to send</arg>
		<arg name="ip" type="string">The target to send the packet to. Format `ip:port`</arg>
	</args>
	<rets>
		<ret name="length" type="number">Returns the length of the sent data or `-1` on failure</ret>
	</rets>
</function>