<type name="gmoddatapack" category="libraryfunc" is="library">
	<summary>
		# gmoddatapack
		This module changes how GMod's data pack compresses files by compressing them once set instead of delaying the compression until a person joins to avoid having a lag spike and increased loading times when initially joining. <br>
		This is not that useful by itself, though when you're developing and do lots of map changes or restarts this can save a bit of time.<br>
		Additionally using the <page>holylib_gmoddatapack_removeserverif</page> and <page>holylib_gmoddatapack_removecomments</page> convars, it can strip files reducing size further.
		Supports: `Linux32` | `Linux64` | `Windows32` | `Windows64`
		<added version="0.8"></added>
	</summary>
</type>