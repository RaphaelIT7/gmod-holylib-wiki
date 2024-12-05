<function name="DeleteString" parent="INetworkStringTable" type="classfunc">
	<description>
		Deletes the string at the given index.
		<note>
			This is quiet slow since internally it saves all stringtable values, then fully clears it, and recreates it without the given index.<br>
			It will also delete precache data if you delete strings from tables like `modelprecache` and such.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="index" type="number">The index to delete</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the string was successfully deleted</ret>
	</rets>
</function>