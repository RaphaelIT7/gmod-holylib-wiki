<function name="GetAll" parent="gameserver" type="libraryfunc">
	<description>
		Returns a table that contains all <page text="CGameClients">CGameClient</page>.<br>
		It will return `nil` on failure.  
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="clients" type="table"></ret>
	</rets>
</function>