<function name="SetCurrentDistance" parent="soundscape" type="libraryfunc">
	<description>
		Sets the distance for the currently active soundscapeUpdate.<br>
		Only works inside the <page>HolyLib:OnSoundScapeUpdateForPlayer</page> hook!<br>
		Mostly only useful to influence which soundscape could be selected.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="distance" type="number"></arg>
	</args>
</function>