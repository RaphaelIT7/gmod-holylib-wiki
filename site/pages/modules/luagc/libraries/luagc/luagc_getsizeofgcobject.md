<function name="GetSizeOfGCObject" parent="luagc" type="libraryfunc">
	<description>
		Returns the memory size of the given object.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<args>
		<arg name="object" type="any">Object to use</arg>
		<arg name="recursive" type="boolean" default="false">
			If recursive is set, then the size of referenced objects is added to the total result
		</arg>
		<arg name="ignoreGCObjects" type="table" default="nil">
			ignoreGCObjects - A **sequential** table inside which you can provide GC objects that should be ignored like the global table/`_G`
		</arg>
	</args>
	</args>
	<rets>
		<ret name="memorySize" type="number">total size in memory (in bytes)</ret>
	</rets>
</function>