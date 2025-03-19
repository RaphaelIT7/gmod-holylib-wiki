<function name="holylib_filesystem_easydircheck" parent="" type="libraryfield">
    <description>
		If enabled, it will check if the file contains a `.` after the last `/`.<br>
		If so it will cause `CBaseFileSystem::IsDirectory` to return false since we assume it's a file.<br>
		This will cause `file.IsDir` to fail on folders with names like these `test/test1.23`.
    </description>
    <value>0</value>
    <realm>Server</realm>
</function>