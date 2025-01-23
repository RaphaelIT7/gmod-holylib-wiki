<type name="holylib_filesystem_easydircheck" category="" is="convar">
	<summary>
		# holylib_filesystem_easydircheck = 0
		If enabled, it will check if the file contains a `.` after the last `/`.<br>
		If so it will cause `CBaseFileSystem::IsDirectory` to return false since we assume it's a file.<br>
		This will cause `file.IsDir` to fail on folders with names like these `test/test1.23`.
	</summary>
</type>