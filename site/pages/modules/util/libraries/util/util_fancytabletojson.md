<function name="FancyTableToJSON" parent="util" type="libraryfunc">
	<description>
		It's <a href="https://wiki.facepunch.com/gmod/util.TableToJSON">util.TableToJSON</a> but faster and it will turn numbers into integers if they fit as one.
		<added version="0.5"></added>
		<note>
			This implementation will include `null` for values it cannot handle.<br>
			Gmod hides `null` but we don't meaning if for example we get `{math.huge}` as input, it will return `[null]` which still is valid json.<br>
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="tbl" type="table">The table to turn into json</arg>
		<arg name="pretty" type="boolean">Make it a pretty json string</arg>
		<arg name="ignorecycle" type="boolean" default="false">If `true` it won't throw a lua error when you have a table that is recursive/cycle.</arg>
	</args>
	<rets>
		<ret name="json" type="string">The final json string</ret>
	</rets>
</function>