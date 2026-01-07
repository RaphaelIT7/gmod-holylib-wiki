<function name="CreatePushChannel" parent="bass" type="libraryfunc">
	<description>
		Creates a push channel into which you can write data<br>
		See https://www.un4seen.com/doc/#bass/BASS_StreamCreate.html with `STREAMPROC_PUSH` for more details.<br>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="sampleRate" type="number"></arg>
		<arg name="channels" type="number"></arg>
		<arg name="flags" type="number"></arg>
	</args>
	<rets>
		<arg name="channel" type="IGMODAudioChannel">The created channel. `nil` on error</arg>
		<arg name="errMsg" type="string" default="nil">The error string</arg>
	</rets>
</function>