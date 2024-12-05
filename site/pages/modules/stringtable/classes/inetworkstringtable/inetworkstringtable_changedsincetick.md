<function name="ChangedSinceTick" parent="INetworkStringTable" type="classfunc">
	<description>
		Returns whether or not the stringtable changed since the given tickcount.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tickCount" type="number">the tickcount to compare against</arg>
	</args>
	<rets>
		<ret name="changed" type="boolean">Returns `true` if it changed since the given tick</ret>
	</rets>
</function>