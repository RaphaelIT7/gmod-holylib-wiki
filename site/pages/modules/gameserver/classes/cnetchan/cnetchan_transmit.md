<function name="Transmit" parent="CNetChan" type="classfunc">
	<description>
		Transmit any pending data to the channel.<br>
		Returns `true` on success.
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
			The used sub channel is marked as used and the server waits until the channel sends a signal that the sub channel data was received<br>
			This argument causes **all** sub channels to be marked as free instantly after this transmit, making networking possibly unreliable but allowing for far greater speeds.
		</arg>
	</args>
	<rets>
		<ret name="success" type="boolean"></ret>
	</rets>
</function>