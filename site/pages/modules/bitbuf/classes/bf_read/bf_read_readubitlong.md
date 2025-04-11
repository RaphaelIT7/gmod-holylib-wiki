<function name="ReadUBitLong" parent="bf_read" type="classfunc">
	<description>
		Reads a unsigned number with the given number of bits.<br>
		If you want to read a signed number use <page>bf_read:ReadBitLong</page> or <page>bf_read:ReadSBitLong</page>
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