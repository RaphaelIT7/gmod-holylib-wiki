<function name="GetTable" parent="stringtable" type="libraryfunc">
	<description>
		Returns the INetworkStringTable found by the given tableID.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tableID" type="number">The tableID to search for</arg>
	</args>
	<rets>
		<ret name="stringtable" type="INetworkStringTable">Returns the found stringtable. returns `nil` on failure</ret>
	</rets>
</function>