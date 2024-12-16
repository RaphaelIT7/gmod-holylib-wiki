<type name="VoiceData" category="classfunc" is="class">
	<summary>
# VoiceData

This class represents the VoiceData received by a client<br>

| Metatable function | Description |
|-------|------|
| `__tostring` | Returns a formated string of the VoiceData -> `VoiceData [Player Slot][Length/Size]` |
| `__index` | Used to find the functions on the metatable and access saved variables |
| `__newindex` | Used to allow one to save variables on the object |
| `__gc` | Internally deletes the VoiceData turning it invalid |
	</summary>
</type>