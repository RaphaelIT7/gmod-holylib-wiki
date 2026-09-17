<function name="SetPacketStartCallback" parent="CNetChan" type="classfunc">
	<description>
		Sets the callback function that is called each time a new packet has started arriving on the channel.<br>
		Can be returned using <page>CNetChan:GetPacketStartCallback</page>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="callback" type="function">The new callback function
			<callback>
				<arg name="channel" type="CNetChan">The channel</arg>
				<arg name="inSequenceNr" type="number">The incoming sequence number of the packet</arg>
				<arg name="outSequenceNrAck" type="number">The outgoing sequence number that was acknowledged</arg>
			</callback>
		</arg>
	</args>
</function>
