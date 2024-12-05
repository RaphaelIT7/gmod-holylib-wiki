<function name="SetStringUserData" parent="INetworkStringTable" type="classfunc">
	<description>
		Sets the userdata for the given index.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="index" type="number">the index to set the userdata on</arg>
		<arg name="value" type="string">the userdata to set</arg>
		<arg name="length" type="number" default="nil">the length that should be used. **Only use this if you know what your doing!**</arg>
	</args>
</function>

<example>
	<description>Messing with gmod's datapack paths</description>
	<code>
local dataTablePaths = {
	"/lua/", -- The order is also important!
	-- Add paths that are frequently used to the top so there the first one to be checked for a file.  
	-- This will improve the performance because it will reduce the number of paths it checks for a file.

	"/addons/exampleaddon/lua/", -- Each legacy addon that has a lua folder has it's path.  
	"/workshop/lua/",
	"/workshop/gamemode/",
	"/gamemode/",
	"/workshop/gamemodes/base/entities/",
	"/gamemodes/base/entities/",
	"/workshop/gamemodes/sandbox/entities/",
	"/gamemodes/sandbox/entities/",
}

local client_lua_files = stringtable.FindTable("client_lua_files")
client_lua_files:SetStringUserData(0, table.concat(dataTablePaths, ";")) -- Set our new datatable paths.
-- Reducing the amount of paths will improve clientside filesystem performance
-- You can see all datapack paths by running "datapack_paths" clientside or printing it like this:
-- print(client_lua_files:GetStringUserData(0))
-- NOTE: Changes to the datatable path will only affect the lcl search path clientside.
	</code>
</example>