<function name="GetClient" parent="sourcetv" type="libraryfunc">
	<description>
		Returns the CHLTVClient at that slot or `nil` on failure.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="playerSlot" type="number"></arg>
	</args>
	<rets>
		<ret name="client" type="CHLTVClient"></ret>
	</rets>
</function>