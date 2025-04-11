<function name="BlockCreation" parent="gameevent" type="libraryfunc">
	<description>
		Blocks/Unblocks the creation of the specified gameevent.
		<added version="0.5"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="gameevent" type="string">The gameevent to block</arg>
		<arg name="blockCreation" type="boolean" default="false">If `true`, it will block the creation of the specified gameevent until this is set back to false</arg>
	</args>
</function>