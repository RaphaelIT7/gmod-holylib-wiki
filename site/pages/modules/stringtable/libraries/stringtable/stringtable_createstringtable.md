<function name="CreateStringTable" parent="stringtable" type="libraryfunc">
	<description>
		Creates a new stringtable.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tableName" type="string">The tableName to use</arg>
		<arg name="maxEntries" type="number">The maximum number of entires. **Needs to be to the power of 2!**</arg>
		<arg name="userdatafixedsize" type="number" default="0">The fixed size to use for userdata</arg>
		<arg name="userdatanetworkbits" type="number" default="0">The number of bits to use for userdata</arg>
	</args>
	<rets>
		<ret name="stringtable" type="INetworkStringTable">Returns the newly created stringtable. returns `nil` on failure</ret>
	</rets>
</function>