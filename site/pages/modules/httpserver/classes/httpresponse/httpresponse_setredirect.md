<function name="SetRedirect" parent="HttpResponse" type="classfunc">
	<description>
		Redirects one to the given URL and returns the given code.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="url" type="string">url to redirect to</arg>
		<arg name="code" type="number" default="302">code to return</arg>
	</args>
</function>