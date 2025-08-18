<function name="LoadVoiceStreamFromWaveString" parent="voicechat" type="libraryfunc">
	<description>
		Tries to load a VoiceStream from the given data.
		<br>
		Meaning of the `statusCode`:

		| Number | Meaning |
		|-------|------|
		| -2 | File not found |
		| -1 | Invalid type |
		| 0 | None |
		| 1 | Done |

		<note>
			If `async` was used, it **won't** return anything.
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="waveData" type="string">the fileName to use</arg>
		<arg name="callback" type="function" default="nil">
			the callback function to use
			<callback>
				<arg name="voiceStream" type="VoiceStream">the loaded VoiceStream or `nil` on failure</arg>
				<arg name="statusCode" type="number">the statusCode. `1` on success</arg>
			</callback>
		</arg>
		<arg name="promiseToNeverModify" type="boolean" default="false">
			If set to `true`, it will reference the waveData instead of copying it reducing memory usage and improving speed though you need to keep your promise of never modifying it while it's in use!
		</arg>
	</args>
	<rets>
		<ret name="voiceStream" type="VoiceStream">the loaded VoiceStream or `nil` on failure.</ret>
		<ret name="statusCode" type="number">the statusCode. `1` on success</ret>
	</rets>
</function>