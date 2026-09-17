<function name="MarkHandled" parent="HttpRequest" type="classfunc">
	<description>
		Marks the request as handled.<br>
		The worker thread that is waiting on this request will pick this up, send the response back to the client and delete the request.<br>
		<note>
			Returning any value other than `false` from a request handler (see <page>HttpServer:Get</page> and the other method functions) will call this automatically, so you usually don't need to call this yourself.<br>
			If a request handler errors out, it will also be marked as handled automatically.
		</note>
		<warning>
			Once a request was marked handled, the `HttpRequest` becomes invalid and must no longer be used!
		</warning>
	</description>
	<realm>Server</realm>
</function>
