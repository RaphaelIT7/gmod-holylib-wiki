<function name="SetRedirect" parent="HttpRequest" type="classfunc">
	<description>
		Redirects one to the given URL and returns the given code.
		<added version="0.8">Added with the <page>HttpResponse</page> merge into this class</added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="url" type="string">url to redirect to</arg>
		<arg name="code" type="number" default="302">code to return</arg>
	</args>
</function>