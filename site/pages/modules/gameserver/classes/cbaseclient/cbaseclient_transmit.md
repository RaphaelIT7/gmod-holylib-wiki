<function name="Transmit" parent="CBaseClient" type="classfunc">
	<description>
		Transmit any pending data to the client.<br>
		Returns `true` on success.
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="onlyReliable" type="boolean" default="false">If `true` **only** the reliable stream is transmitted</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>

<example>
	<description>Exampe usage of this function</description>
	<code>
concommand.Add("nukechannel", function(ply)
   	local string = ""
    for k = 1, 65532 do
        string = string .. "a"
    end
    util.AddNetworkString("Example")
    for k = 1, 10 do
        net.Start("Example", false)
            net.WriteString(string)
        net.Broadcast()
        gameserver.GetClient(ply:EntIndex()-1):Transmit() -- Forces the message to be transmitted directly avoiding a overflow.
    end 
end)
	</code>
	<output>
	</output>
</example>