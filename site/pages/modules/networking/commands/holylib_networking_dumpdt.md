<type name="holylib_networking_dumpdt" category="" is="convar">
	<summary>
		# holylib_networking_dumpdt
		Dumps every server class's send table (`SendTable`) to disk.<br>
		For each server class, a `<index>_<classname>-<tablename>.txt` file listing all of its send properties (recursing into any nested data tables) is written to `garrysmod/holylib/dump/dt/`. An additional `fulllist.dt` file mapping every class name to its dump index is written alongside them.<br>
		Mainly useful for inspecting/reverse-engineering the networked class layout of the game or gamemode.
	</summary>
</type>
