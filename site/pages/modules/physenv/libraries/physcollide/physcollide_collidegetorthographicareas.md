<function name="CollideGetOrthographicAreas" parent="physcollide" type="libraryfunc">
	<description>
		get the approximate cross-sectional area projected orthographically on the bbox of the collide
		<note>
			These are fractional areas - unitless. Basically this is the fraction of the OBB on each axis that
			would be visible if the object were rendered orthographically.
			This has been precomputed when the collide was built or this function will return 1,1,1
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="collide" type="CPhysCollide"></arg>
	</args>
	<rets>
		<ret name="mins" type="Vector"></ret>
	</rets>
</function>