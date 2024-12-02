<function name="SetSignonState" parent="HolyLib" type="libraryfunc">
	<description>
		Sets the SignOnState for the given client.<br>
		Returns `true` on success.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply / userid" type="Player / Number">---</arg>
		<arg name="signOnState" type="Number">---</arg>
		<arg name="spawnCount" type="Number">---</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">returns `true` on success</ret>
	</rets>
</function>