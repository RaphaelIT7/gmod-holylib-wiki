<type name="LuaInterface" category="classfunc" is="class">
	<summary>
# LuaInterface

This class represents a completely separate Lua interface (its own Lua state), created with <page>luathreads.CreateInterface</page>.<br>
It can run its own code on a separate thread, independently from the main gamemode's Lua state.

<note>
	Unlike most other HolyLib classes, this object is **not** automatically garbage collected. It's destroyed when HolyLib (or the Lua state that created it) shuts down.
</note>

| Metatable function | Description |
|-------|------|
| `__tostring` | Returns a formated string of the LuaInterface -> `LuaInterface [name]` |
| `__index` | Used to find the functions on the metatable and access saved variables |
| `__newindex` | Used to allow one to save variables on the object |
	</summary>
</type>