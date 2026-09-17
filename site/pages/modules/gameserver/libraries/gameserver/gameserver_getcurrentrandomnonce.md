<function name="GetCurrentRandomNonce" parent="gameserver" type="libraryfunc">
	<description>
		Returns the server's current random nonce, used internally by the engine for Steam client authentication.
	</description>
	<unsafe version="0.8">
	<realm>Server</realm>
	<rets>
		<ret name="nonce" type="number">The current random nonce</ret>
	</rets>
</function>