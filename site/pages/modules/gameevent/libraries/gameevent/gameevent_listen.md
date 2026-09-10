<function name="Listen" parent="gameevent" type="libraryfunc">
	<description>
		Registers a listener for the given game event, so it can be caught using `hook.Add` with the event's name.<br>
		<note>
			This function only exists inside HolyLib's separate <page>holylua</page> interface, since that interface doesn't have the normal gamemode hook system set up.<br>
			Inside the normal gamemode state, this will be GMod's original [gameevent.Listen](https://wiki.facepunch.com/gmod/gameevent.Listen) function.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">Name of the game event to listen to</arg>
	</args>
</function>