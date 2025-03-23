<function name="GetMessageCallback" parent="CNetChan" type="classfunc">
	<description>
		Returns the current message callback function.<br>
		Can be set using <page>CNetChan:SetMessageCallback</page>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="callback" type="function">current callback function or `nil` if none was set</ret>
	</rets>
</function>