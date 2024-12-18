<function name="CreateEnvironment" parent="physenv" type="libraryfunc">
	<description>
		Creates a new physics environment.
		It will apply all settings from the main environment on the newly created on to match.
		<note>
			If you notice Physics objects that have a invalid entity, report this. But this should normally never happen.
			In this case, this means that something is failing to remove physics objects and it will cause random crashes.
		</note>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="IPhysicsEnvironment" type="IPhysicsEnvironment"></ret>
	</rets>
</function>