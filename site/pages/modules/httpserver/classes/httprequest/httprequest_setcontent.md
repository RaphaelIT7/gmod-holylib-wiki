<function name="SetContent" parent="HttpRequest" type="classfunc">
	<description>
		Sets the content for the response.
		<added version="0.8">Added with the <page>HttpResponse</page> merge into this class</added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="content" type="string">the content to set</arg>
		<arg name="contentType" type="string" default="text/plain">the content type to use</arg>
	</args>
</function>