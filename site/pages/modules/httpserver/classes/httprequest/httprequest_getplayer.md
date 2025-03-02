<function name="GetPlayer" parent="HttpRequest" type="classfunc">
	<description>
		Returns the player who sent the HTTP Request or NULL if it didn't find it.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="player" type="Player">Found <page>Player</page> or a NULL Entity.</ret>
	</rets>
</function>