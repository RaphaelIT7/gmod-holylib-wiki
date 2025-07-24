<function name="ApproximateProcessMemoryUsage" parent="gameserver" type="libraryfunc">
	<description>
		Approximates the memory usage of the server in bytes.
		<removed version="0.8">This function was removed since it never actually worked</removed>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="memoryUsage" type="number">memory usage in bytes</ret>
	</rets>
</function>