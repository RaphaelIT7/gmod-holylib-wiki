<function name="SetCurrentSoundscape" parent="soundscape" type="libraryfunc">
	<description>
		Sets the soundscape entity for the currently active soundscapeUpdate.<br>
		Only works inside the <page>HolyLib:OnSoundScapeUpdateForPlayer</page> hook!<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="soundScape" type="Entity">The soundScape to use
			<warning>
				The given entity must be a `env_soundscape` or else it will throw an error!
			</warning>
		</arg>
	</args>
</function>