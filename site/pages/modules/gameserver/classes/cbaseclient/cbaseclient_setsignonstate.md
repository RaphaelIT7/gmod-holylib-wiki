<function name="SetSignonState" parent="CBaseClient" type="classfunc">
	<description>
		Sets the SignOnState for the given client.
		<note>
			This function does normally **not** directly set the SignOnState.<br>
			Instead it calls the responsible function for the given SignOnState like for `SIGNONSTATE_PRESPAWN` it will call `SpawnPlayer` on the client.<br>
			Set the `rawSet` to `true` if you want to **directly** set the SignOnState.
		</note>
		<added version="0.7">
			This function was formerly known as `HolyLib.SetSignOnState`
		</added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="code" type="string"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` on success.</ret>
	</rets>
</function>