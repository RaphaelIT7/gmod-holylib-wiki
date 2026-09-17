<function name="holylib_networkthreading_forcechallenge" parent="" type="libraryfield">
	<description>
		If enabled, clients are ALWAYS requested to have a challenge for A2S requests (`A2S_INFO`, `A2S_PLAYER`, `A2S_RULES`).<br>
		If the packet's challenge is missing or invalid, a challenge is sent back to the client instead of the request being processed.
	</description>
	<value>0</value>
	<realm>Server</realm>
</function>
