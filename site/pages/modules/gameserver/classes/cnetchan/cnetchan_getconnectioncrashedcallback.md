<function name="GetConnectionCrashedCallback" parent="CNetChan" type="classfunc">
	<description>
		Returns the current connection crashed callback function.<br>
		Can be set using <page>CNetChan:SetConnectionCrashedCallback</page>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="callback" type="function">current callback function or `nil` if none was set</ret>
	</rets>
</function>