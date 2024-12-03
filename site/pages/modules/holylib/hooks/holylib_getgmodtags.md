<function name="HolyLib:GetGModTags" parent="" type="hook">
	<description>
		This hook is called when Gmod is updating it's servertags.<br>
		You can override the servertags freely by simply returning the new string .  
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="tags" type="string">The new tags to push</ret>
	</rets>
</function>

<example>
	<description>Template for adding custom tags</description>
	<code>
hook.Add("HolyLib:GetGModTags", "Example", function()
	local tags = {
		"gm:sandbox", -- Gamemode name. (Not title!)
		"gmc:sandbox", -- Gamemode category
		"ver:"..VERSION, -- Server version
		"loc:de", -- server location
		"hltv:1", -- mark the server as a hltv server.
		"gmws:123456789", -- Gamemode workshop id (Do collectons work? idk)
	}

	return table.concat(tags, " ")
end)
	</code>
</example>