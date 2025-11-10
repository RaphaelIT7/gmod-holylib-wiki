<function name="GetAll" parent="soundscape" type="libraryfunc">
	<description>
		Returns a table containing all soundscapes that exist.<br>
		key will be the soundscape index and value will be the name of the soundscape<br>
		The table can possibly be non-sequential so use `pairs` instead of `ipairs` when iterating.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="soundScapes" type="table">All existing soundscapes</ret>
	</rets>
</function>