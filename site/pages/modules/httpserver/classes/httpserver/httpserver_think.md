<function name="Think" parent="HttpServer" type="classfunc">
	<description>
		Goes through all requests and calls their callbacks or deletes them after they were sent out.
		<note>
			This is already internally called every frame, so you don't need to call this.
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
</function>