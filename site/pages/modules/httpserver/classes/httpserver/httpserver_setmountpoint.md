<function name="SetMountPoint" parent="HttpServer" type="classfunc">
	<description>
		This mounts the given folder to the given path.
		<note>
			You can call this multiple times for the same path to mount multiple folders to it.
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="mountPoint" type="string">path to the folder</arg>
		<arg name="folder" type="string">name of the folder</arg>
	</args>
</function>