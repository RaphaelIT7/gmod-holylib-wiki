<function name="holylib_filesystem_predictexistance" parent="" type="libraryfield">
    <description>
		If enabled, it will try to predict the path of a file, but if the file doesn't exist in the predicted path, we'll just say it doesn't exist.<br>
		Doesn't rely on `holylib_filesystem_predictpath` but it also works with it together.<br>

		The logic for prediction is exactly the same as `holylib_filesystem_predictpath` but it will just stop checking if it doesn't find a file in the predicted path instead of checking then all other searchpaths.<br>

		<note>
			Enabling this can cause issues like models having no collisions when their `.phy` file is in a different path than their `.mdl` file.
		</note>
    </description>
    <value>0</value>
    <realm>Server</realm>
</function>