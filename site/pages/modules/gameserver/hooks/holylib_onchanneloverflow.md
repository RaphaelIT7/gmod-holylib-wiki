<function name="HolyLib:OnChannelOverflow" parent="" type="hook">
	<description>
		Called when the client's net channel is overflowed.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="client" type="CGameClient">The client thats changing the SignOnState</arg>
	</args>
	<rets>
		<ret name="cancel" type="boolean" default="false">Return `true` to stop the engine from disconnecting the client.  </ret>
	</rets>
</function>

<example>
	<description>Example on how to handle a overflow</description>
	<code>
hook.Add("HolyLib:OnChannelOverflow", "Example", function(client)
	local bf = client:GetStreamReliable()
	file.Write("stream.txt", bf:GetData())
	bf:Reset() -- Reset the stream, data may get lost, but the client won't be dropped
	return true -- Return true to stop the engine from disconnecting the client
end)
	</code>
	<output>
	</output>
</example>