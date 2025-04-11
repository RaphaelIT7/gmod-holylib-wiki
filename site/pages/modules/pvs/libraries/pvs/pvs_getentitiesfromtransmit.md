<function name="GetEntitiesFromTransmit" parent="pvs" type="libraryfunc">
	<description>
		Returns a table containing all entities that will be transmitted.
		<note>
			Only use this function inside the <page>HolyLib:PreCheckTransmit</page> or <page>HolyLib:PostCheckTransmit</page> hook!
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="entities" type="table">All entities that will be transmited</ret>
	</rets>
</function>