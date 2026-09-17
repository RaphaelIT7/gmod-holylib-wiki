<function name="holylib_filesystem_filecache" parent="" type="libraryfield">
    <description>
        If enabled, it will build a file tree of every searchpath on disk and use it for file/folder lookups, skipping the searchpaths themself for the lookup.<br>
		Toggling this convar back on will immediately trigger a rebuild of the file tree.
		<note>
			The file tree can be dumped into the console using `holylib_filesystem_dumpfiletree`.
		</note>
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>
