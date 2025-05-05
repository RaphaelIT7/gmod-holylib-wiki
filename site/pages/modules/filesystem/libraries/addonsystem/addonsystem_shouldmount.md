<function name="ShouldMount" parent="addonsystem" type="libraryfunc">
	<description>
		Returns `true` if the given addon should be mounted
		<bug>
			The `workshopID` should be a string as being a number will cause issues.
		</bug>
		<added version="0.7"></added>
		<changed version="0.8">
			The `workshopID` argument was changed from a number to a string to solve possible bugs.
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="workshopID" type="number">The workshop ID to use</arg>
	</args>
	<rets>
		<ret name="shouldMount" type="boolean">`true` if it should be mounted</ret>
	</rets>
</function>