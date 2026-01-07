<function name="GetGCCount" parent="luagc" type="libraryfunc">
	<description>
		Returns the total count of GC objects.
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="targetObject" type="any">
			If given a `targetObject` object, it will count up all GCobjects until it reached the `targetObject` after which it'll stop.<br>
			(the `targetObject` **won't** be included in the result!)
		</arg>
	</args>
	<rets>
		<ret name="count" type="number"></ret>
	</rets>
</function>