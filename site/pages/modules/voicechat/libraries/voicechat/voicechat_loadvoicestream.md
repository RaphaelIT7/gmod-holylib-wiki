<function name="LoadVoiceStream" parent="voicechat" type="libraryfunc">
	<description>
		Tries to load a VoiceStream from the given file.
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
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="fileName" type="string">the fileName to use</arg>
		<arg name="gamePath" type="string" default="DATA">the gamePath to use</arg>
		<arg name="async" type="boolean" default="false">if `true` a callback is required</arg>
		<arg name="callback" type="function" default="nil">
			the callback function to use
			<callback>
				<arg name="voiceStream" type="VoiceStream">the loaded VoiceStream or `nil` on failure</arg>
				<arg name="statusCode" type="number">the statusCode. `1` on success</arg>
			</callback>
		</arg>
	</args>
	<rets>
		<ret name="voiceStream" type="VoiceStream">the loaded VoiceStream or `nil` on failure.</ret>
		<ret name="statusCode" type="number">the statusCode. `1` on success</ret>
	</rets>
</function>