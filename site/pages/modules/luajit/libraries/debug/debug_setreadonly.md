<function name="setreadonly" parent="debug" type="libraryfunc">
	<description>
		Forces a table to become read only, meaning it cannot be modified in any way.<br>
		This readonly logic was added into our LuaJIT build and does **not** exist in the normal LuaJIT.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tbl" type="table">The table to apply the readonly flag onto</arg>
		<arg name="readOnly" type="boolean" default="false">If to set or remove the readonly flag.</arg>
	</args>
</function>