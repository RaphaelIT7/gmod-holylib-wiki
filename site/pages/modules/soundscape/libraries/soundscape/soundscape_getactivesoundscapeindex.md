<function name="GetActiveSoundScapeIndex" parent="soundscape" type="libraryfunc">
	<description>
		Returns the currently active soundscape index for the given player or `-1` if they have no soundscape active.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="player" type="Player">The player to get his active soundscape for</arg>
	</args>
	<rets>
		<ret name="soundScapeIndex" type="number" default="nil"></ret>
	</rets>
</function>