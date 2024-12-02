<function name="HolyLib:GetGModTags" parent="" type="hook">
	<description>
		This hook is called when Gmod is updating it's servertags.<br>
		You can override the servertags freely by simply returning the new string.  
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="tags" type="string">The new tags to push</ret>
	</rets>
</function>