<function name="GetGlobalEntityList" parent="" type="libraryfunc">
	<description>
		Returns a table containing all entities that are in the global entity list, basically the same as [ents.GetAll()](https://wiki.facepunch.com/gmod/ents.GetAll) but faster.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="entities" type="table">Returns all entities that exist</ret>
	</rets>
</function>