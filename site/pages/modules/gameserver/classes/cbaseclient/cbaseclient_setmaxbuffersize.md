<function name="SetMaxBufferSize" parent="CBaseClient" type="classfunc">
	<description>
		Resizes the specified buffer to the given size in bytes.
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`<br>
			All data inside that stream is discarded, make sure everything was sent out.
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="reliable" type="boolean" default="false">`true` if the reliable stream should be modified, `false` if the unreliable stream should be modified</arg>
		<arg name="bytes" type="number">number if bytes to resize to</arg>
		<arg name="voice" type="boolean" default="false">`true` if the voice stream should be modified</arg>
	</args>
</function>

<example>
	<description>Exampe usage of this function</description>
	<code>
concommand.Add("biggerBuffer", function(ply)
	local client = gameserver.GetClient(ply:EntIndex()-1)
    client:Transmit() -- Send everything out or else we lose data
    client:SetMaxBufferSize(true, 524288) -- We resize the reliable stream
end)
	</code>
	<output>
	</output>
</example>