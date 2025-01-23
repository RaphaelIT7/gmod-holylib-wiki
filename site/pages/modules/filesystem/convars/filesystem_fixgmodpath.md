<type name="holylib_filesystem_fixgmodpath" category="" is="convar">
	<summary>
		# holylib_filesystem_fixgmodpath = 1
If enabled, it will fix up weird gamemode paths like sandbox/gamemode/sandbox/gamemode which gmod likes to use.<br>
Currently it fixes these paths:<br>
- `[Active gamemode]/gamemode/[anything]/[active gamemode]/gamemode/` -> (Example: `sandbox/gamemode/spawnmenu/sandbox/gamemode/spawnmenu/`)<br>
- `include/include/`<br>
	</summary>
</type>