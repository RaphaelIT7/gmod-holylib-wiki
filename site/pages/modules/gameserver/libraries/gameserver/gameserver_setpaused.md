<function name="SetPaused" parent="gameserver" type="libraryfunc">
	<description>
		Pauses/Unpauses the server.
		<verify>
			does this actually work?
		</verify>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="paused" type="boolean" default="false"></arg>
	</args>
</function>