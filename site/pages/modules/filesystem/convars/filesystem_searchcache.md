<type name="holylib_filesystem_searchcache" category="" is="convar">
	<summary>
		# holylib_filesystem_searchcache = 1
If enabled, it will cause the filesystem to use a cache for the searchpaths.<br>
When you try to open a file with a path like `GAME` which has multiple searchpaths, it will check each one until its found.<br>
Now, the first time it searches for it, if it finds it, we add the file and the searchpath to a cache and the next time the same file is searched for, we try to use our cache search path.<br>

This will improve `file.Open`, `file.Time` and `file.Exists`.<br>
The more searchpaths exist, the bigger the improvement for that path will be.<br>
Example (I got 101 legacy addons):<br>
```
lua_run local a = SysTime() for k=1, 1000 do file.Exists("garrysmod.ver", "GAME") end print(SysTime()-a)

Disabled: 1.907318733
Enabled: 0.035948700999995
```

You also can test it using the `MOD` path. The performance of `file.Exists` for any search path and `MOD` should be somewhat near each other since, it checks the same amount of searchpaths while this is enabled.<br>
```
lua_run local a = SysTime() for k=1, 1000 do file.Exists("garrysmod.ver", "GAME") end print(SysTime()-a)
0.033513544999998

lua_run local a = SysTime() for k=1, 1000 do file.Exists("garrysmod.ver", "MOD") end print(SysTime()-a)
0.037827891999996
```

<note>
	If the file doesn't exist, it will still go thru all search paths to search for it again!<br>
	I don't know if this has any bugs, but while using this for ~1 Month on a server, I didn't find any issues.<br>
	It will also improve the `MOD` search path since it also has multiple search paths.<br>
</note>
	</summary>
</type>