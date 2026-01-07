<function name="SetStatusCode" parent="HttpRequest" type="classfunc">
	<description>
		Sets the status code of the response, clamped between 100 and 600.
		<added version="0.8">Added with the <page>HttpResponse</page> merge into this class</added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="status" type="number">code to return</arg>
	</args>
</function>
