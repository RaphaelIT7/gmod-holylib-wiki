<function name="Subscribe" parent="addonsystem" type="libraryfunc">
	<description>
		Subscribes to the given Steam Workshop item through `SteamUGC`, adds it as an unloaded subscription to the addonsystem and, when called on a listen server, immediately scans for subscriptions so it can be downloaded and mounted.
		<added version="0.9"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="workshopID" type="string">The workshop ID to subscribe to</arg>
	</args>
</function>
