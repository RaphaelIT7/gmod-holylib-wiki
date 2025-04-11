<function name="holylib_filesystem_splitgamepath" parent="" type="libraryfield">
    <description>
        If enabled, it will split each `GAME` path into multiple search paths, depending on it's contents.<br>
		Then when you try to find a file with the `GAME` search path, it will change the pathID to the content path.<br>

		Example:<br>
		File: `cfg/game.cfg`<br>
		Path: `GAME`<br>
		becomes:<br>
		File: `cfg/game.cfg`<br>
		Path: `CONTENT_CONFIGS`<br>

		This will reduce the amount of searchpaths it has to go through which improves performance.<br>

		Content paths:<br>
		- `materials/` -> `CONTENT_MATERIALS`<br>
		- `models/` -> `CONTENT_MODELS`<br>
		- `sound/` -> `CONTENT_SOUNDS`<br>
		- `maps/` -> `CONTENT_MAPS`<br>
		- `resource/` -> `CONTENT_RESOURCE`<br>
		- `scripts/` -> `CONTENT_SCRIPTS`<br>
		- `cfg/` -> `CONTENT_CONFIGS`<br>
		- `gamemodes/` -> `LUA_GAMEMODES`<br>
		- `lua/includes/` -> `LUA_INCLUDES`<br>
		<added version="0.3"></added>
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>