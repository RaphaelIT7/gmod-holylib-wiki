<function name="SeekRelative" parent="bf_read" type="classfunc">
	<description>
		Sets the current position to the given position relative to the current position.<br>
		Basicly `newPosition = currentPosition + iPos`    
	</description>
	<realm>Server</realm>
	<args>
		<arg name="pos" type="number">position to seek to</arg>
	</args>
	<rets>
		<ret name="success" type="boolean">Returns `true` on success. </ret>
	</rets>
</function>