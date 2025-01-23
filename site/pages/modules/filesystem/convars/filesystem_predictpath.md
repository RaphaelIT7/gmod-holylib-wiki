<type name="holylib_filesystem_predictpath" category="" is="convar">
	<summary>
		# holylib_filesystem_predictpath = 1
If enabled, it will try to predict the path for a file.<br>

Example:<br>
Your loading a model.<br>
First you load the `example.mdl` file.<br>
Then you load the `example.phy` file.<br>
Here we can check if the `example.mdl` file is in the searchcache.<br>
If so, we try to use the searchpath of that file for the `.phy` file and since all model files should be in the same folder, this will work for most cases.<br>
If we fail to predict a path, it will end up using one additional search path.<br>
	</summary>
</type>