<function name="GetListeners" parent="gameevent" type="libraryfunc">
	<description>
		Returns the number of Listeners a specific gameevent has.<br>
		If not given a eventName, it will return a table containing all events and listener numbers.  
	</description>
	<realm>Server</realm>
	<args>
		<arg name="eventName" type="string" default="nil">The eventName to return the listener count for. If left nil, it will return a table with all events.</arg>
	</args>
	<rets>
		<ret name="listenerCount" type="number">The number of listeners. Will be a <page>table</page> if not given a eventName</ret>
	</rets>
</function>