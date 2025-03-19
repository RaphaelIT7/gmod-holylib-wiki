<function name="Transmit" parent="CBaseClient" type="classfunc">
	<description>
		Transmit any pending data to the client.<br>
		Returns `true` on success.
		<note>
			This function errors if the client doesn't have a valid `CNetChannel`
		</note>
		<warning>
			Transmitting data to the client causes the client's prediction to **reset and cause prediction errors!**
		</warning>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="onlyReliable" type="boolean" default="false">If `true` **only** the reliable stream is transmitted</arg>
		<arg name="fragments" type="number" default="-1">
			Number of fragments to use.<br>
			the engine by default uses **only** `4` fragments (depends on `net_maxfragments` & raising it increases the number of fragments)<br>
			You can use up to `7` fragments at once as the engine doesn't support more.<br>
			<note>
				Using more fragments increases the networking speed at no cost.
			</note>
		</arg>
		<arg name="freeSubChannels" type="boolean" default="false">
			Each `CNetChannel` has `8` sub channels for networking, on every transmit it uses a single sub channel and sends data.<br>
			The used sub channel is marked as used and the server waits until the client sends a signal that the sub channel data was received<br>
			This argument causes **all** sub channels to be marked as free instantly after this transmit, making networking possibly unreliable but allowing for far greater speeds.
		</arg>
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