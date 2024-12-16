<function name="GetLadder" parent="HolyLib" type="libraryfunc">
	<description>
		Returns the Ladder the player is currently on.
		<note>
			This function currently only works with `func_useableladder`<br>
			(Experimental - Linux 32x safe only)
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="Player">The Player to get the Ladder from</arg>
	</args>
	<rets>
		<ret name="ladder" type="Entity">The Ladder the Player is currently on or `NULL`</ret>
	</rets>
</function>