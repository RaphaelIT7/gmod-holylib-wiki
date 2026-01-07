<function name="AddPreparedResponse" parent="HttpServer" type="classfunc">
	<description>
		**Experimental!**
		Adds a prepared response for the given userID.<br>
		A prepared response won't make any lua call when it matches a incoming request,
		multiple responses can be queued as their responses in order.<br>
		The callback function provides the HttpResponse object which you should use to set all return values.<br>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="userID" type="number"></arg>
		<arg name="path" type="string"></arg>
		<arg name="method" type="string"></arg>
		<arg name="callback" type="function">
			the callback is called instantly
			<callback>
				<arg name="response" type="HttpResponse">The respone in which you should set/prepare the response</arg>
			</callback>
		</arg>
	</args>
</function>