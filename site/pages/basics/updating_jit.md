<title>Updating LuaJIT</title>

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