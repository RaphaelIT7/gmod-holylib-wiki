<function name="GetLastRandomNonce" parent="gameserver" type="libraryfunc">
	<description>
		Returns the server's previous random nonce, used internally by the engine for Steam client authentication.
	</description>
	<unsafe version="0.8">
	<realm>Server</realm>
	<rets>
		<ret name="nonce" type="number">The previous random nonce</ret>
	</rets>
</function>