<function name="FindCollisionSet" parent="physenv" type="libraryfunc">
	<description>
			Returns the collision set by the given index.
			<note>
				Only 32 collision sets can exist at the same time!
			</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="index" type="number"></arg>
	</args>
	<rets>
		<ret name="" type="IPhysicsCollisionSet"></ret>
	</rets>
</function>