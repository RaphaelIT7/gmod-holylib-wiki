<function name="GetActiveSoundScape" parent="soundscape" type="libraryfunc">
	<description>
		Returns the currently active soundscape for the given player
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="player" type="Player">The player to get his active soundscape for</arg>
	</args>
	<rets>
		<ret name="soundScape" type="Entity" default="nil">The active sound scape or nil/NULL</ret>
	</rets>
</function>