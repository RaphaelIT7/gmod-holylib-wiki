<function name="SetThreadSleep" parent="HttpServer" type="classfunc">
	<description>
		The number of ms threads sleep before checking again if a request was handled.  
		Useful to raise it when you let requests wait for a while.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="sleepTime" type="number">time to sleep in ms</arg>
	</args>
</function>