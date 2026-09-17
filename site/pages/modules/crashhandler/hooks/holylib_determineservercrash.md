<function name="HolyLib:DetermineServerCrash" parent="" type="hook">
	<description>
		Called by HolyLib's watchdog thread right before it forcefully terminates the server for appearing frozen, giving you one last chance to cancel it.<br>
		<note>
			This hook is called inside HolyLib's separate <page>holylua</page> interface, **not** the gamemode's normal Lua state.<br>
			This is intentional - the watchdog exists specifically to catch the case where the normal Lua state's thread is stuck/deadlocked and can no longer respond, so it consults the independent <page>holylua</page> state instead. It is only called while that interface is running (See <page>holylib_lua</page>).
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="lagTime" type="number">how long, in milliseconds, the server has been detected as frozen for</arg>
	</args>
	<rets>
		<ret name="cancelCrash" type="boolean">return `true` to cancel the pending termination and reset the watchdog's lag counter. Returning anything else (or nothing) lets the server be terminated</ret>
	</rets>
</function>
