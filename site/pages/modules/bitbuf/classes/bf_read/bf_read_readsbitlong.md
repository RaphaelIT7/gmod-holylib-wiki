<function name="ReadSBitLong" parent="bf_read" type="classfunc">
	<description>
		Reads a signed number with the given number of bits.<br>
		If you want to read a unsigned number use <page>bf_read:ReadBitLong</page> or <page>bf_read:ReadUBitLong</page>
		<added version="0.4"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="bits" type="number">How many bits to read</arg>
	</args>
	<rets>
		<ret name="value" type="number"></ret>
	</rets>
</function>