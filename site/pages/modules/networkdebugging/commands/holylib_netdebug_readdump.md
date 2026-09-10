<type name="holylib_netdebug_readdump" category="" is="convar">
	<summary>
		# holylib_netdebug_readdump &lt;filepath&gt;
		Reads a network packet dump and prints every net message it contains to the console.<br>
		Whenever a client gets disconnected for an unusual reason (i.e. **not** a normal timeout, user disconnect or server shutdown), this module automatically saves the last 256 packets sent to that client under `garrysmod/holylib/netdump/[SteamID64]/`. This command lets you read one of those `.dat` files back to help figure out what went wrong.
		<warning>
			Don't run this on a production server. If the given file isn't a valid packet dump, this will crash the server.
		</warning>
	</summary>
</type>