<function name="SaveVoiceStream" parent="voicechat" type="libraryfunc">
	<description>
		Sends the given voice data to the given client.
		<br>
		Meaning of the `statusCode`:

		| Number | Meaning |
		|-------|------|
		| -2 | File not found |
		| -1 | Invalid type |
		| 0 | None |
		| 1 | Done |

		<note>
			If `async` was used, it **won't** return anything.<br>
			This function also supports `.wav` files to write the data into since `0.8`.<br>
			You should **always** inform your players if you save their voice!<br>
			<br>
			You can set both `fileName` and `returnWaveData` which will cause it to be written to disk and the data to be returned<br>
			If `fileName` and `returnWaveData` are both not set then it will error as atleast one of them needs to be enabled.
		</note>

		<added version="0.7"></added>
		<changed version="0.8">
			The `async` argument was removed and the behavior was changed<br>
			If a `callback` is specified it **WONT** return **anything** and the `callback` will be called, as it will execute everythign **async**.
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="voiceStream" type="VoiceStream">the VoiceStream to save</arg>
		<arg name="fileName" type="string" default="nil">the fileName to use. This can also be the callback function, in which case it will internally enable `returnWaveData` & behave like it</arg>
		<arg name="gamePath" type="string" default="DATA">the gamePath to use</arg>
		<arg name="callback" type="function" default="nil">
			the callback function to use
			<callback>
				<arg name="voiceStream" type="VoiceStream">the loaded VoiceStream or `nil` on failure</arg>
				<arg name="statusCode" type="number">the statusCode. `1` on success</arg>
				<arg name="waveData" type="string">the wave data. `nil` if `returnWaveData` **wasn't** set to `true`</arg>
			</callback>
		</arg>
		<arg name="returnWaveData" type="boolean" default="false">If the function should return the wave data as a string</arg>
	</args>
	<rets>
		<ret name="statusCode" type="number">the statusCode. `1` on success</ret>
		<ret name="waveData" type="string">the wave data. `nil` if `returnWaveData` **wasn't** set to `true`</ret>
	</rets>
</function>

<example>
	<description>Showing the agument overloads</description>
	<code>
Default version:

-- Either you set the last false / returnWaveData to true to receive the wavData as a string, or you provide no file name
voicechat.SaveVoiceStream(stream, "file.wav", "DATA", function(stream, status, wav) end, false)

Argument Overload version:

-- This will always return wav data since we never get a file name.
voicechat.SaveVoiceStream(stream, function(stream, status, wav) end)
	</code>
</example>