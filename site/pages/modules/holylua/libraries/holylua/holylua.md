<type name="holylua" category="libraryfunc" is="library">
	<summary>
# holylua
HolyLib can create a second, fully independent Lua interface (its own Lua state) that runs alongside the gamemode's normal Lua state.<br>
It is started automatically whenever the <page>holylib_lua</page> ConVar is enabled, and automatically loads every script found inside `lua/autorun/_holylua/` when it starts up.<br>
This library lets your normal gamemode code send code over to run inside that separate interface.

<note>
	Since it's a separate Lua state, it does **not** share any globals, tables or hooks with your gamemode. Communication between the two has to happen thru functions like <page>holylua.RunString</page>.
</note>
	</summary>
</type>