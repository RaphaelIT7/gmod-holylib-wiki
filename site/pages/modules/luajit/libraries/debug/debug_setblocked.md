<function name="setblocked" parent="debug" type="libraryfunc">
	<description>
		Marks the function to be inaccessable by any debug function & `setfenv` & `getfenv`.<br>
		This function is used internally for the FFI Scripts executed by HolyLib to prevent access to FFI functions when their disabled.
		<note>
			Once set this intentionally cannot be reverted.
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="func" type="function">The function to block debug access</arg>
	</args>
</function>