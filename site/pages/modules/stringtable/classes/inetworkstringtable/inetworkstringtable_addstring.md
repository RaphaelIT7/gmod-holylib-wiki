<function name="AddString" parent="INetworkStringTable" type="classfunc">
	<description>
		Adds the given string into the stringtable.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="value" type="string">the string to add</arg>
		<arg name="isServer" type="boolean" default="true">if were adding the string serverside or not</arg>
	</args>
	<rets>
		<ret name="index" type="number">Returns the index that was assigned to the string</ret>
	</rets>
</function>