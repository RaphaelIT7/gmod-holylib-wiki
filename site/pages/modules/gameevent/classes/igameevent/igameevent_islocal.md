<function name="IsLocal" parent="IGameEvent" type="classfunc">
	<description>
		Returns whether this IGameEvent is local / serverside only.<br>
		If this returns `true` this event won't be networked when broadcasted.
		<added version="0.5"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="local" type="boolean">Returns `true` if this IGameEvent is local.</ret>
	</rets>
</function>