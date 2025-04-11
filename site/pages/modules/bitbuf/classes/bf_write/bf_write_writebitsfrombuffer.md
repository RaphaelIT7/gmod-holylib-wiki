<function name="WriteBitsFromBuffer" parent="bf_write" type="classfunc">
	<description>
		Writes the given number of bits from the given buffer into this buffer.
		<note>
			The current position for the given buffer will change as we internally read from it!
		</note>
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="buffer" type="bf_read"></arg>
		<arg name="bits" type="number"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` on success.</ret>
	</rets>
</function>