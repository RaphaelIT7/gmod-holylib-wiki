<function name="FindTable" parent="stringtable" type="libraryfunc">
	<description>
		Returns the INetworkStringTable found by the given name.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tableName" type="string">The tableName to search for</arg>
	</args>
	<rets>
		<ret name="stringtable" type="INetworkStringTable">Returns the found stringtable. returns `nil` on failure</ret>
	</rets>
</function>