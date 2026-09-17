<function name="FireGameEvent" parent="CBaseClient" type="classfunc">
	<description>
		Fires/sends the given gameevent to this specific client.
		<note>
			If the `gameevent` module is disabled, it will throw a lua error!
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="event" type="IGameEvent">the gameevent to fire</arg>
	</args>
</function>
