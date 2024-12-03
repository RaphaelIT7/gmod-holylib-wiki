<function name="SetSignonState" parent="HolyLib" type="libraryfunc">
	<description>
		Sets the SignOnState for the given client.<br>
		Returns `true` on success.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The player to set the SignOnState for. Can also be the userID(number)</arg>
		<arg name="signOnState" type="number"></arg>
		<arg name="spawnCount" type="number"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean">returns `true` on success</ret>
	</rets>
</function>