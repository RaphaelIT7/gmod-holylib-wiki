<type name="VProfNode" category="classfunc" is="class">
	<summary>
# VProfNode

This class represents the engine VProfNode class<br>

| Metatable function | Description |
|-------|------|
| `__tostring` | Returns a formated string of the VProfNode -> `VProfNode [name]` |

<note>
	Currently a VProfNode **NEVER** becomes NULL meaning in cases like <page>vprof.Term</page> it will become unsafe to use a VProfNode.<br>
	Try to not store VProfNode, use <page>vprof.GetCurrentNode</page> instead.
</note>
	</summary>
</type>