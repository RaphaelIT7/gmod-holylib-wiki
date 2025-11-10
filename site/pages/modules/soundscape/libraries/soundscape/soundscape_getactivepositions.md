<function name="GetActivePositions" parent="soundscape" type="libraryfunc">
	<description>
		Returns a table containing all positions used for local sounds that are linked to the currently active soundscape.<br>
		Will return an empty table if the client has no active soundscape.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="player" type="Player">The player to use</arg>
	</args>
	<rets>
		<ret name="localSounds" type="table">table(number - vector)</ret>
	</rets>
</function>