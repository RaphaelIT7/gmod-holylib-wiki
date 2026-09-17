<function name="holylib_networkthreading_strictpackets" parent="" type="libraryfield">
	<description>
		If enabled, split packets and compressed packets from addresses that aren't connected to the server will not be processed and are dropped instead.<br>
		It also enforces harder limits on the size of connectionless packets coming from addresses that aren't connected, and discards connectionless packets that aren't a known query type.
	</description>
	<value>1</value>
	<realm>Server</realm>
</function>
