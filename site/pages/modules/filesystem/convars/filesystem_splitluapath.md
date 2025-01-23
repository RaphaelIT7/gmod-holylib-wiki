<type name="holylib_filesystem_splitluapath" category="" is="convar">
	<summary>
		# holylib_filesystem_splitluapath = 0
Does the same for `lsv` to save performance.<br>

<bug>
	This currently breaks workshop addons.
</bug>

Lua paths:<br>
- `sandbox/` -> `LUA_GAMEMODE_SANDBOX`<br>
- `effects/` -> `LUA_EFFECTS`<br>
- `entities/` -> `LUA_ENTITIES`<br>
- `weapons/` -> `LUA_WEAPONS`<br>
- `lua/derma/` -> `LUA_DERMA`<br>
- `lua/drive/` -> `LUA_DRIVE`<br>
- `lua/entities/` -> `LUA_LUA_ENTITIES`<br>
- `vgui/` -> `LUA_VGUI`<br>
- `postprocess/` -> `LUA_POSTPROCESS`<br>
- `matproxy/` -> `LUA_MATPROXY`<br>
- `autorun/` -> `LUA_AUTORUN`<br>
	</summary>
</type>