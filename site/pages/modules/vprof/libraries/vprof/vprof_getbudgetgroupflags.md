<function name="GetBudgetGroupFlags" parent="vprof" type="libraryfunc">
	<description>
		Returns the name of the budget group by the given index.  
	</description>
	<realm>Server</realm>
	<args>
		<arg name="index" type="number">budget group index</arg>
	</args>
	<rets>
		<ret name="flags" type="number">
			flags of the given budget group.<br>
			These are the [budget groups](https://github.com/RaphaelIT7/obsolete-source-engine/blob/a49f02f4133fd54b758c8e4a8c41ba4323f1ae8e/public/tier0/vprof.h#L54-L58):<br>
			`BUDGETFLAG_CLIENT = 0` Shows up in the client panel.<br>
			`BUDGETFLAG_SERVER = 1` Shows up in the server panel.<br>
			`BUDGETFLAG_OTHER = 2` Unclassified (the client shows these but the dedicated server doesn't).<br>
			`BUDGETFLAG_HIDDEN = 32768`<br>
			`BUDGETFLAG_ALL = 65535`<br>
		</ret>
	</rets>
</function>