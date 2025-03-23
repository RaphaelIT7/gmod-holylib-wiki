<function name="SetMaxBufferSize" parent="CNetChan" type="classfunc">
	<description>
		Resizes the specified buffer to the given size in bytes.
		<note>
			All data inside that stream is discarded, make sure everything was sent out.
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="reliable" type="boolean" default="false">`true` if the reliable stream should be modified, `false` if the unreliable stream should be modified</arg>
		<arg name="bytes" type="number">number if bytes to resize to</arg>
		<arg name="voice" type="boolean" default="false">`true` if the voice stream should be modified</arg>
	</args>
</function>