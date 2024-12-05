<function name="GetStringUserData" parent="INetworkStringTable" type="classfunc">
	<description>
		Returns the userdata from the given index.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="index" type="number">the index to get the userdata from</arg>
	</args>
	<rets>
		<ret name="value" type="string">Returns the userdata found. Can be `nil`</ret>
		<ret name="length" type="number">Returns the length of the userdata</ret>
	</rets>
</function>