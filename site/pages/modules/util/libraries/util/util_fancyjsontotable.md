<function name="FancyJSONToTable" parent="util" type="libraryfunc">
	<description>
		Converts the json into a table like <a href="https://wiki.facepunch.com/gmod/util.JSONToTable">util.JSONToTable</a><br>
		This version is noticably faster than Gmod's version and uses less memory in the process.<br>
		<added version="0.73"></added>
		<changed version="0.8">`ignoreConversions` argument got added</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="json" type="string">The json to turn into a table</arg>
		<arg name="ignoreConversions" type="boolean">Make it a pretty json string</arg>
	</args>
	<rets>
		<ret name="output" type="table">The final table</ret>
	</rets>
</function>