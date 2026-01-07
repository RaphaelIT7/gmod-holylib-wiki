<function name="Update" parent="bass" type="libraryfunc">
	<description>
		Manually updates all BASS channels as if `time` milliseconds have passed.<br>
		It returns true on success, false if an update is already in progress.<br>
		See https://www.un4seen.com/doc/#bass/BASS_Update.html for more details.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="time" type="number" default="RealFrameTime()">
			If no time is specified it defaults to [RealFrameTime()](https://wiki.facepunch.com/gmod/Global.RealFrameTime).
		</arg>
	</args>
</function>