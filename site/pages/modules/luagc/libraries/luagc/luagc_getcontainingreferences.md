<function name="GetContainingReferences" parent="luagc" type="libraryfunc">
	<description>
		Returns all GCobjects that the given object stores.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="object" type="any">Object to check</arg>
		<arg name="recursive" type="boolean" default="false">
			If enabled the results wil include all GCobjects referenced by all child objects
		</arg>
		<arg name="ignoreGCObjects" type="table" default="nil">
			ignoreGCObjects - A **sequential** table inside which you can provide GC objects that should be ignored like the global table/`_G`
		</arg>
	</args>
	<rets>
		<ret name="references" type="table"></ret>
	</rets>
</function>