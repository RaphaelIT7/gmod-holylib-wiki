<function name="Disconnect" parent="HolyLib" type="libraryfunc">
	<description>
		Disconnects the given player from the server.
		<note>
			Unlike Gmod's version which internally calls the `kickid` command,<br>
			we directly call the `Disconnect` function with no delay.  
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">the player to disconnect, **can be** a userid/number</arg>
		<arg name="reason" type="string">the reason to disconnect the client with</arg>
		<arg name="silent" type="boolean" default="false">if `true` it will silently close the net channel and sends no disconnect to the client</arg>
		<arg name="nogameevent" type="boolean" default="false">if `true` it will stop the `player_disconnect` gameevent from being created</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">returns `true` if it succeeded in disconnecting the client</ret>
	</rets>
</function>