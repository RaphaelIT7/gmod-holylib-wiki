<function name="SetShouldMount" parent="addonsystem" type="libraryfunc">
	<description>
		Sets whether the given addon should be mounted.
		<bug>
			The `workshopID` should be a string as being a number will cause issues.
		</bug>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="workshopID" type="number">The workshop ID to use</arg>
		<arg name="shouldMount" type="boolean" default="false">If the addon should be mounted or not</arg>
	</args>
</function>