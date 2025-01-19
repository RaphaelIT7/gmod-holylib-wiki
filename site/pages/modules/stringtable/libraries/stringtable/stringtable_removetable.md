<function name="RemoveTable" parent="stringtable" type="libraryfunc">
	<description>
		Removes the given stringtable.
		<warning>
			Deleting a stringtable is **NOT** networked!<br>
			In addition, it might be unsafe and result in crashes when it's a engine created stringtable.<br>
			Generally, only use it when you **KNOW** what your doing.
		</warning>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="table" type="INetworkStringTable">The table to set it on</arg>
	</args>
</function>