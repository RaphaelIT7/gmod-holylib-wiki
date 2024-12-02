<function name="FadeClientVolume" parent="HolyLib" type="libraryfunc">
	<description>Fades out the clients volume. Internally just runs soundfade with the given settings on the client. A direct engine bind to IVEngineServer::FadeClientVolume</description>
	<source>https://github.com/danielga/sourcesdk-minimal/blob/master/public/igameevents.h#L95</source>
	<realm>Server</realm>
	<args>
		<arg name="ply" type="player">the player to target</arg>
		<arg name="fadePercent" type="number">Percentage of volume that decreases per second</arg>
		<arg name="fadeOutSeconds" type="number">Time to fade out - in seconds</arg>
		<arg name="holdTime" type="number">Time the volume is held - in seconds</arg>
		<arg name="fadeInSeconds" type="number">Time to fade in after holdTime - in seconds</arg>
	</args>
</function>