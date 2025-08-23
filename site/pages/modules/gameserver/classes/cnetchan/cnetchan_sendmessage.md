<function name="SendMessage" parent="CNetChan" type="classfunc">
	<description>
		Sends out the given buffer as a message.<br>
		Returns `true` on success.
		<added version="0.7"></added>
		<changed version="0.8">
			This function will now check if the given buffer is overflowed and throw a error if it is
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="buffer" type="bf_write"></arg>
		<arg name="reliable" type="boolean" default="false"></arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>