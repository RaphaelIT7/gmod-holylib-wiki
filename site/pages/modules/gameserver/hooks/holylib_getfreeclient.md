<function name="HolyLib:GetFreeClient" parent="" type="hook">
	<description>
		Called when the engine looks for a free client slot for a connecting address, allowing you to fully override which <page>CGameClient</page> gets used.<br>
		<note>
			This hook is **not** called from <page>gameserver.GetFreeClient</page> itself, to prevent infinite recursion.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ip" type="string">The address that is looking for a free client. Format `ip:port`</arg>
	</args>
	<rets>
		<ret name="client" type="CGameClient" default="nil">Return a client to use it as the free client instead of the engine's own search.<br>If the returned client is already connected, it is ignored and the engine performs its normal search instead - unless <page text="unsafe code">Safety</page> is enabled, in which case the client is forcefully disconnected and used anyway.</ret>
	</rets>
</function>