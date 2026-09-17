<function name="ChangeCollection" parent="addonsystem" type="libraryfunc">
	<description>
		Switches the active Steam Workshop collection to the given collection ID and scans it for subscriptions to mount.<br>
		This also updates the `host_workshop_collection` convar to the given collection ID.
		<warning>
			Content that was mounted from the previously active collection stays mounted!
		</warning>
		<added version="0.9"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="collectionID" type="string">The workshop ID of the collection to switch to</arg>
	</args>
</function>
