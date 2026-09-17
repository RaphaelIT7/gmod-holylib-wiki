<function name="SetThreads" parent="HttpServer" type="classfunc">
	<description>
		Sets the min/max amount of threads the underlying HTTP server uses to handle incoming connections.
		<note>
			Like <page>HttpServer:Get</page>, this needs to be called again after <page>HttpServer:Start</page> since it replaces the task queue that `Start` uses.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="minThreads" type="number">Minimum amount of threads to keep around</arg>
		<arg name="maxThreads" type="number">Maximum amount of threads that may be spawned</arg>
	</args>
</function>
