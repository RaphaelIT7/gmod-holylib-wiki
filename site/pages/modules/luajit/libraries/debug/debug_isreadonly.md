<function name="isreadonly" parent="debug" type="libraryfunc">
	<description>
		Checks if the table is set to be read only.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tbl" type="table">The table to check</arg>
	</args>
	<rets>
		<ret name="readOnly" type="boolean">Returns `true` if the table is set to be readonly.</ret>
	</rets>
</function>