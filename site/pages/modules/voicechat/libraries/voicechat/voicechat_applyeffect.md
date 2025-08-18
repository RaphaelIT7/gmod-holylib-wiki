<function name="ApplyEffect" parent="voicechat" type="libraryfunc">
	<description>
		Applies the given effectData to the given Data/Stream.<br>
		If a `callback` is specified it **WONT** return **anything** and the `callback` will be called, as it will execute everythign **async**.<br>
		If you want it to **not** run async, simply provide **no** callback function, it will return `true` on success<br>
		<note>
			It should be safe to modify/use the VoiceStream while it's being modified async **BUT** you should try to avoid doing that.
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="effectData" type="table">The effect data that should be applied to the VoiceData</arg>
		<arg name="voiceData" type="VoiceData">The Voice data to apply the effect onto. Can also be a <page>VoiceStream</page></arg>
		<arg name="callback" type="function" default="nil">
			The callback function to use. If one is given it will apply the effect async. Without a callback it **won't** be async!
			<callback>
				<arg name="voiceStream" type="VoiceStream">the loaded VoiceStream or `nil` on failure</arg>
				<arg name="statusCode" type="number">the statusCode. `1` on success</arg>
			</callback>
		</arg>
	</args>
</function>

<example>
	<description>All currently valid effectData inputs</description>
	<code>
{
	ContinueOnFailure = true, -- If you process a VoiceStream and it fails to apply a effect for some reason it will still proceed and ignore the failure

	-- Volume effect
	EffectName = "Volume",
	Volume = 1.0, -- The volume for the audio
}
	</code>
</example>
