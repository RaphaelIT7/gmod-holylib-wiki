<function name="holylib_filesystem_searchcache" parent="" type="libraryfield">
    <description>
        If enabled, it will cause the filesystem to use a cache for the searchpaths.<br>
		When you try to open a file with a path like `GAME` which has multiple searchpaths, it will check each one until its found.<br>
		Now, the first time it searches for it, if it finds it, we add the file and the searchpath to a cache and the next time the same file is searched for, we try to use our cache search path.<br>

		<example>
			<description>
				This will improve `file.Open`, `file.Time` and `file.Exists`.<br>
				The more searchpaths exist, the bigger the improvement for that path will be.<br>
			</description>
			<code>
				lua_run local a = SysTime() for k=1, 1000 do file.Exists("garrysmod.ver", "GAME") end print(SysTime()-a)
			</code>
			<output>
Disabled: 1.907318733
Enabled: 0.035948700999995
			</output>
		</example><br>
		
		<example>
			<description>
				You also can test it using the `MOD` path. The performance of `file.Exists` for any search path and `MOD` should be somewhat near each other since,
				it checks the same amount of searchpaths while this is enabled.<br>
			</description>
			<code>
1: lua_run local a = SysTime() for k=1, 1000 do file.Exists("garrysmod.ver", "GAME") end print(SysTime()-a)

2: lua_run local a = SysTime() for k=1, 1000 do file.Exists("garrysmod.ver", "MOD") end print(SysTime()-a)
			</code>
			<output>
1: 0.033513544999998
2: 0.037827891999996
			</output>
		</example>

		<note>
			If the file doesn't exist, it will still go thru all search paths to search for it again!<br>
			I don't know if this has any bugs, but while using this for ~1 Month on a server, I didn't find any issues.<br>
			It will also improve the `MOD` search path since it also has multiple search paths.<br>
		</note>
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>