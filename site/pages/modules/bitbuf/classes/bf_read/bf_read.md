<type name="bf_read" category="classfunc" is="class">
	<summary>
		# bf_read

		<added version="0.4"></added>
		<changed version="0.7">
			`__newindex` was added
		</changed>

		| Metatable function | Description |
		|-------|------|
		| `__tostring` | Returns a formated string of the bf_read -> `bf_read [size in bits]` |
		| `__index` | Used to find the functions on the metatable and access saved variables |
		| `__newindex` | Used to allow one to save variables on the object |
		| `__gc` | Internally deletes the bf_read turning it invalid |
	</summary>
</type> 