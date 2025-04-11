<function name="holylib_filesystem_cachefilehandle" parent="" type="libraryfield">
    <description>
		If enabled, it will cache the file handle and return it if needed.  
		<note>
			This will probably cause issues if you open the same file multiple times.  
		</note>
		<warning>
			This is a noticeable improvement, but it seems to break .bsp files :/
		</warning>
		<added version="0.4"></added>
    </description>
    <value>0</value>
    <realm>Server</realm>
</function>