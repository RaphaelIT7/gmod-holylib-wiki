<type name="crashhandler" category="libraryfunc" is="library">
	<summary>
		# crashhandler
		This is loaded as the first module and catches crashes to include more information about HolyLib at the time of the crash.<br>
		Unlike other crash handlers, ours won't affect the generated `debug.log` allowing us to create our own crash dump AND to also get a useful `debug.log` at the same time.<br>
		Supports: `Linux32` | `Linux64`
		<added version="0.8"></added>
	</summary>
</type>