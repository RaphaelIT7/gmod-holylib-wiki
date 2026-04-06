<title>HolyLib LuaJIT</title>

# JIT Support

If you enabled HolyLib's JIT build (See below) then some C functions may support being JIT'd.<br>
If you see a function having the `JIT SINCE x.x` mark, then it supports this - if a function does **NOT** support it you can expect LuaJIT to fail tracing it and either result to trace stitching or aborting the trace entirely, resulting in worse performance.<br>

# Updating JIT

HolyLib has a `luajit` module that updates Garry's mod LuaJIT version to a newer one.<br>
In addition, it also restores [debug.upvaluejoin](https://wiki.facepunch.com/gmod/debug.upvaluejoin), 
[debug.upvalueid](https://wiki.facepunch.com/gmod/debug.upvalueid), 
[debug.setupvalue](https://wiki.facepunch.com/gmod/debug.setupvalue), 
[debug.setlocal](https://wiki.facepunch.com/gmod/debug.setlocal).<br>
It also exposes lua's original `require` function under `jit.require` allowing you to require things like `ffi` and `jit.profiler`.<br>
by default `string.buffer` and `ffi` are already loaded.

## Enabling the module

1. Add `-holylib_enable_luajit 1` to the server startup arguments<br>
2. Restart the server<br>
3. Verify using `print(jit.version)` that it updated. (It should print something like `LuaJIT 2.1.1697887905`)

## Changes in our LuaJIT build
There are more changes than it just being an newer JIT version<br>

\- [+] Save and restore XMCSR flags when entering & leaving the VM (See https://github.com/RaphaelIT7/gmod-holylib/issues/129)
\- [+] Added the ability to concat bool values.<br>
\- [+] Added block debug functionality for function to prevent someone from getting functions they shouldn't have.<br>
\- [+] Added read only table functionality to prevent someone from modifying a table while its being used by another thread<br>
\- [+] Exposed `luaopen_jit_profile` & `lua_index2adr` for HolyLib.<br>
\- [+] Implemented fix for FFI Sandwich/LUA VM re-entry through JIT trace (See https://github.com/LuaJIT/LuaJIT/pull/1165)<br>
\- [+] Experimentally implemented `Sink optimization` (See https://github.com/LuaJIT/LuaJIT/pull/652)<br>
\- [+] Specialize to the global environment change (See https://github.com/LuaJIT/LuaJIT/pull/910)<br>
\- [+] Compile unpack() given constant start and end indices (See https://github.com/LuaJIT/LuaJIT/pull/910)<br>
\- [+] Experimentally implemented `Reduce method overhead in loops by specializing to metatables` (See https://github.com/LuaJIT/LuaJIT/pull/899)<br>
\- [+] Added JIT support for userdata meta- & usertable access<br>
\- [#] Made `cdata` return the type as `LUA_TUSERDATA` so that we can more easily allow FFI -> C calls without needing to hook 10 functions (& the TypeID also conflicted with gmod)<br>
\- [#] Improved `GMODLUA_GetUserType` to directly do it's stuff without using the Lua stack<br>