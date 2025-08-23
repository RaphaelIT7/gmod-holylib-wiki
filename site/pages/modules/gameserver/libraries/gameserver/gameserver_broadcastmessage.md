<function name="BroadcastMessage" parent="gameserver" type="libraryfunc">
	<description>
		Sends a custom net message to all clients.<br>
		This function allows you send any netmessage you want.<br>
		You should know what your doing since this function doesn't validate anything.
		<added version="0.7">
			This function was formerly known as `HolyLib.BroadcastCustomMessage`
		</added>
		<changed version="0.8">
			This function will now check if the given buffer is overflowed and throw a error if it is
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="type" type="number">You can find all valid types in the <a href="https://github.com/RaphaelIT7/gmod-holylib/blob/main/source/sourcesdk/protocol.h#L86-L145">protocol.h</a></arg>
		<arg name="name" type="string">name of broadcast message</arg>
		<arg name="buffer" type="bf_write">buffer</arg>
	</args>
</function>

<example>
	<description>Example usage, we enable `sv_cheats` clientside while having it disabled serverside.</description>
	<code>
local bf = bitbuf.CreateWriteBuffer(64) -- Create a 64 bytes buffer.

bf:WriteByte(1) -- How many convars were sending
bf:WriteString("sv_cheats") -- ConVar name
bf:WriteString("1") -- ConVar value

-- You can use CBaseClient:SendNetMsg to send it to specific clients.
gameserver.BroadcastMessage(5, "NET_SetConVar", bf) -- 5 = net_SetConVar / net message type.
	</code>
	<output>
	</output>
</example>