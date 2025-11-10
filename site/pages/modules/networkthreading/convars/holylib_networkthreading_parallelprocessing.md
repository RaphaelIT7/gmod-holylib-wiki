<function name="holylib_networkthreading_parallelprocessing" parent="" type="libraryfield">
	<description>
		If enabled, some packets will be processed by the networking thread instead of the main thread.
		<note>
			This can cause the <page>HolyLib:ProcessConnectionlessPacket</page> to not be called for the affected packets!
		</note>
	</description>
	<value>1</value>
	<realm>Server</realm>
</function>