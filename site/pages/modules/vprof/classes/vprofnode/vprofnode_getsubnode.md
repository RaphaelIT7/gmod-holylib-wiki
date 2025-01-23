<function name="GetSubNode" parent="VProfNode" type="classfunc">
	<description>
		Returns or creates a node with the given data.
		<note>
			The scope name is **permanently** allocated and only freed when <page>vprof.Term</page> is called.<br>
			Use a **consistent** scope name if you don't want to have memory leaks.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="name" type="string">scope name</arg>
		<arg name="detailLevel" type="number">detail level</arg>
		<arg name="budgetGroup" type="string">budget group name</arg>
	</args>
	<rets>
		<ret name="node" type="VProfNode"></ret>
	</rets>
</function>