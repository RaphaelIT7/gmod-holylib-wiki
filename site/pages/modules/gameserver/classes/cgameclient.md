<type name="CGameClient" category="classfunc" is="class">
	<summary>
# CGameClient

This class directly represents the CGameClient object in c++<br>
It inherits all functions of the <page>CBaseClient</page> class.

<added version="0.7"></added>

| Metatable function | Description |
|-------|------|
| `__tostring` | Returns a formated string of the CGameClient -> `CGameClient [userID][clientName]` |
| `__index` | Used to allow one to access saved lua data on the object |
| `__newindex` | Used to allow one to save lua data on the object |
	</summary>
	<realm>Server</realm>
</type>