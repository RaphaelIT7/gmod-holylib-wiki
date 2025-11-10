<function name="SetCurrentPlayerPosition" parent="soundscape" type="libraryfunc">
	<description>
		Sets the player position for the currently active soundscapeUpdate.<br>
		Only works inside the <page>HolyLib:OnSoundScapeUpdateForPlayer</page> hook!<br>
		Mostly only useful to influence which soundscape could be selected.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="position" type="Vector"></arg>
	</args>
</function>