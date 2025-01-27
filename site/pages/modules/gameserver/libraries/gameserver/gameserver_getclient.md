<function name="GetClient" parent="gameserver" type="libraryfunc">
	<description>
		Returns the CGameClient at that player slot or `nil` on failure.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="playerSlot" type="number"></arg>
	</args>
	<rets>
		<ret name="client" type="CGameClient"></ret>
	</rets>
</function>