<function name="GetIndex" parent="VoiceStream" type="classfunc">
	<description>
		Returns a **copy** of the VoiceData for the given index or `nil`.
		<note>
			The returned VoiceData is just a copy,<br>
			modifying them won't affect the internally stored VoiceData.<br>
			Call <page>VoiceStream:SetData</page> or <page>VoiceStream:SetIndex</page> after you modified it to update it.
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="voiceData" type="VoiceData">Copy of the internally stored VoiceData</ret>
	</rets>
</function>