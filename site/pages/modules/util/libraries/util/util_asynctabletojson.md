<function name="AsyncTableToJSON" parent="util" type="libraryfunc">
	<description>
		Turns the given table into a json string just like <page>util.FancyTableToJSON</page> but it will do this on a different thread.<br>
		<added version="0.73"></added>
		<warning>
			By giving the table to this function you make a promise to **not** modify the table while the json string is being created!<br>
			This is because we don't copy the table, we instead copy the pointer into a new Lua state where we then iterate/access it from another state/thread and if you **modify** it in any way you will experience a crash.<br>
			You still can access the table in that time, you are just not allowed to modify it.<br>
			It was observed that you can kinda modify the table though if you add new elements/the size of the table changes while its still creating the json string you will crash.<br>
		</warning>
		<note>
			This function requires the `luajit` module to be enabled.<br>
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tbl" type="table">The table to turn into json</arg>
		<arg name="callback" type="function">
			the callback that is called after it's done with the table
			<callback>
				<arg name="json" type="string">the final json</arg>
			</callback>
		</arg>
		<arg name="pretty" type="boolean">Make it a pretty json string</arg>
	</args>
</function>