<function name="holylib_filesystem_fixgmodpath" parent="" type="libraryfield">
    <description>
        If enabled, it will fix up weird gamemode paths like sandbox/gamemode/sandbox/gamemode which gmod likes to use.<br>
		Currently it fixes these paths:<br>
		- `[Active gamemode]/gamemode/[anything]/[active gamemode]/gamemode/` -> (Example: `sandbox/gamemode/spawnmenu/sandbox/gamemode/spawnmenu/`)<br>
		- `include/include/`<br>
        <added version="0.3"></added>
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>