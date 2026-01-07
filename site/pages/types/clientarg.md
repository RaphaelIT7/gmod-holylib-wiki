<title>ClientArg</title>
<arglist>CBaseClient|Player|number</arglist>

This is a special type of argument that internally tries to find the `CBaseClient` using the input.<br>
If given a <page>number</page> it will treat it as the `playerslot` which is always the same as `Player:EntIndex() - 1` and try to get the player on that slot<br>

<added version="0.8">
	In an internal cleanup the global function `Util::Get_Client` was added to create more consistent behavior for arguments.<br>
	In previous functions may only accept a <page>CBaseClient</page>, or just a <page>Player</page>, a few even just using the `playerslot` number.<br>
</added>