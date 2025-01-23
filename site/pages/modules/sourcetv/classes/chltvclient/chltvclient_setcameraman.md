<function name="SetCameraMan" parent="CHLTVClient" type="classfunc">
	<description>
		Sends the `hltv_cameraman` event to the specific client and blocks the `HLTVDirector` from changing the view.<br>
		Call it with `0` / `NULL` to reset it and let the `HLTVDirector` take control again.
	</description>
	<realm>Server</realm>
	<args>
		<arg name="entityIndex" type="number">entity index or <page>Entity</page></arg>
	</args>
</function>