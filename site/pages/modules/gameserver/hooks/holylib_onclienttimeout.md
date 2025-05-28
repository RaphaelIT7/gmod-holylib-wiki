<function name="HolyLib:OnClientTimeout" parent="" type="hook">
	<description>
		Called when a client is marked to timeout.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="client" type="CGameClient"></arg>
	</args>
	<rets>
		<ret name="timeoutExtension" type="number">
			Return `0` to let the client normally timeout.<br>
			Return a number in seconds above `0` and it will be added to the timeout giving the client more time and the client won't be disconnected.
		</ret>
	</rets>
</function>