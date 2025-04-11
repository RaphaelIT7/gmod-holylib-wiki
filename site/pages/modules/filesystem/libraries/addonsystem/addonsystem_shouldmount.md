<function name="ShouldMount" parent="addonsystem" type="libraryfunc">
	<description>
		Returns `true` if the given addon should be mounted
		<bug>
			The `workshopID` should be a string as being a number will cause issues.
		</bug>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="workshopID" type="number">The workshop ID to use</arg>
	</args>
	<rets>
		<ret name="shouldMount" type="boolean">`true` if it should be mounted</ret>
	</rets>
</function>