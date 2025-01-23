<type name="EntityList" category="classfunc" is="class">
	<summary>
# EntityList

This class should remove some overhead to improve performance since you can pass it to some functions.<br>
It is also used by other modules to improve their performance if they have to loop thru all entities or push entities to lua.

<added version="0.7"></added>

| Metatable function | Description |
|-------|------|
| `__tostring` | Returns a formated string of the EntityList -> `EntityList [entity count]` |
| `__index` | Used to allow one to access saved lua data on the object |
| `__newindex` | Used to allow one to save lua data on the object |
| `__gc` | Deletes the class & frees all internal references |
	</summary>
</type>