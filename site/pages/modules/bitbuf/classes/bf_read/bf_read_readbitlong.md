<function name="ReadBitLong" parent="bf_read" type="classfunc">
	<description>
		Reads a number with the given number of bits.  
		<note>
			This is only available for the 32x!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="bits" type="number">How many bits to read<args>
		<arg name="signed" type="boolean" default="false"></arg>
	</args>
	<rets>
		<ret name="value" type="number"></ret>
	</rets>
</function>