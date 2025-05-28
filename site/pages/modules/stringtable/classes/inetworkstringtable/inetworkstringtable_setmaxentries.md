<function name="SetMaxEntries" parent="INetworkStringTable" type="classfunc">
	<description>
		Sets the entry/string limit to the given number.
		<note>
			Raising this will causes issues in some cases where the limit is hardcoded clientside.<br>
			Stringtables that this shouldn't be used on:<br>
			`modelprecache` -> Limited by `CClientState::model_precache`<br>
			`genericprecache` -> Limited by `CClientState::generic_precache`<br>
			`soundprecache` -> Limited by `CClientState::sound_precache`<br>
			`decalprecache` -> Limited by `CClientState::decal_precache`<br>
			`networkvars` -> Limited by the internal net messages gmod uses. (Mainly NW2's networking)
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="maxStrings" type="number">The new max string limit. **This needs to be to the power of 2!**</arg>
	</args>
</function>