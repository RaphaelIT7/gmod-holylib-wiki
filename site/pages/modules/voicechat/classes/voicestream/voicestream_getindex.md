<function name="GetIndex" parent="VoiceStream" type="classfunc">
	<description>
		Returns a **copy** of the VoiceData for the given index or `nil`.
		<note>
			The returned VoiceData is just a copy as long as you didn't set `directData`<br>
			modifying them won't affect the internally stored VoiceData.<br>
			Call <page>VoiceStream:SetData</page> or <page>VoiceStream:SetIndex</page> after you modified it to update it.
		</note>
		<added version="0.7"></added>
		<changed version="0.8">
			The `directData` argument was added.
		</changed>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="directData" type="boolean" default="false">
			If true it will return the VoiceData itself **instead of** creating a copy<br>
			If you modify it you will change the VoiceData stored in the stream!
		</arg>
	</args>
	<rets>
		<ret name="voiceData" type="VoiceData">Copy of the internally stored VoiceData</ret>
	</rets>
</function>