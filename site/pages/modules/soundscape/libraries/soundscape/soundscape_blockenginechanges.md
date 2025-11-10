<function name="BlockEngineChanges" parent="soundscape" type="libraryfunc">
	<description>
		Sets if the engine should be blocked from changing the soundscape of the given player.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="player" type="Player">The player to set</arg>
		<arg name="shouldBlock" type="boolean" default="false">Should block changes?</arg>
	</args>
</function>