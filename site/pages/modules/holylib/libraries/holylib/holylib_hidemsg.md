<function name="HideMsg" parent="HolyLib" type="libraryfunc">
	<description>
		Adds the given regex pattern to HolyLib's internal list of hidden messages, or removes it again if it was already added and `remove` is `true`.
		<note>
			The final logic that actually hides matching messages is still missing, so this function currently has no visible effect - it only tracks the list of patterns internally.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="regex" type="string">the regex pattern to add to (or remove from) the hidden message list</arg>
		<arg name="remove" type="boolean">if `true` and the pattern was already added, it will be removed from the list</arg>
	</args>
</function>
