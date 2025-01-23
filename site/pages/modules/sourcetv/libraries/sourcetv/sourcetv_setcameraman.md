<function name="SetCameraMan" parent="sourcetv" type="libraryfunc">
	<description>
		Sends the `hltv_cameraman` event all clients and blocks the `HLTVDirector` from changing the view.<br>
		Call it with `0` / `NULL` to reset it and let the `HLTVDirector` take control again.
		<note>
			This won't set it for new clients.<br>
			You have to call it again for thoes.
		</note>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entityIndex" type="number">entity index or <page>Entity</page></arg>
	</args>
</function>