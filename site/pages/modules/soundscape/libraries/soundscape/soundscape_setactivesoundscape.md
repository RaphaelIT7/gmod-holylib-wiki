<function name="SetActiveSoundscape" parent="soundscape" type="libraryfunc">
	<description>
		Sets the soundscape entity for the given player, use soundscape.BlockEngineChanges as else the engine might override it.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="player" type="Player">The player to use</arg>
		<arg name="soundScape" type="Entity">The soundScape to use
			<warning>
				The given entity must be a `env_soundscape` or else it will throw an error!
			</warning>
		</arg>
	</args>
</function>