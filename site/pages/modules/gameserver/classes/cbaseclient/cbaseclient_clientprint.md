<function name="ClientPrint" parent="CBaseClient" type="classfunc">
	<description>
		Prints the given message into the client's console.
		<note>
			It **won't** add `\n` to the end, you have to add it yourself.
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="message" type="string"></arg>
	</args>
</function>