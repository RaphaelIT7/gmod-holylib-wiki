<title>Installation & Updating</title>

# Installation

1. Download the `ghostinj.dll`, `holylib.vdf` and `gmsv_holylib_linux.so` from the latest release.<br>
2. Put the `ghostinj.dll` into the main directory where `srcds_linux` is located.<br>
3. Put the `holylib.vdf` into the `garrysmod/addons/` directory.<br>
4. Put the `gmsv_holylib_linux.so` into the `garrysmod/lua/bin/` directory.<br>
5. Add `-usegh` to the servers startup params.<br>
If you use a panel like Pterodactyl or something similar, you can use the gamemode field(in most cases) like this: `sandbox -usegh`<br>

If you already had a `ghostinj.dll`, you can rename it to `ghostinj2.dll` and it will be loaded by holylib's ghostinj<br>

# Updating

When updating holylib, the server is **always** required to be offline.<br>
Using `plugin_unload` will fail since there are things like the `networking` module that can't be unloaded currently.

## Newer GhostInj
1. Append `_updated` to the new file to have a result like this `gmsv_holylib_linux_updated.so`<br>
2. Upload the file into the `lua/bin` folder<br>
3. Restart the server normally.<br>
On the next startup the ghostinj will replace the old holylib file with the new one.

## Older GhostInj
1. Shutdown the Server<br>
2. Upload the new file<br>
3. Enjoy it<br>