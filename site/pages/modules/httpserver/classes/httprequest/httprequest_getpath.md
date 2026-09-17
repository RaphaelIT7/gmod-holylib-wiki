<function name="GetPath" parent="HttpRequest" type="classfunc">
	<description>
		Returns the raw request path, e.g. `/users/42`.<br>
		Unlike <page>HttpRequest:GetPathParam</page>, this returns the whole path as-is instead of extracting a named path parameter from it.
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="path" type="string">The requested path</ret>
	</rets>
</function>
