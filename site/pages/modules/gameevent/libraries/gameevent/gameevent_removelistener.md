<function name="RemoveListener" parent="gameevent" type="libraryfunc">
	<description>
		Removes the Lua gameevent listener from the specific gameevent.
		<added version="0.1"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="gameevent" type="string" default="nil">The gameevent to remove the lua listener from.</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` if the listener was successfully removed from the given event.</ret>
	</rets>
</function>