<function name="SetAllowClientSideAddString" parent="stringtable" type="libraryfunc">
	<description>
		Marks the stringtable to allow clients to add strings to it?
		<verify>
			Does this really work?<br>
			And what does it really do?
		</verify>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="table" type="INetworkStringTable">The table to set it on</arg>
		<arg name="allowClientSideAddString" type="boolean">If `true`, clients are allowed to add strings to the stringtable</arg>
	</args>
</function>