<function name="GetCompressedSize" parent="gmoddatapack" type="libraryfunc">
	<description>
		Returns the compressed size of the code, this is the size that is sent to the client.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string"></arg>
	</args>
	<rets>
		<ret name="size" type="number">Returns `nil` if it didn't find the file or something else went wrong.</ret>
	</rets>
</function>