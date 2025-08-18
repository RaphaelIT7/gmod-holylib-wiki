<function name="GetData" parent="VoiceStream" type="classfunc">
	<description>
		Returns a table, with the tick as key and **copy** of the VoiceData as value.  
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
		<ret name="data" type="table">The table containing the VoiceData thats internally sotred.<br>key(number) = tick number<br>value(VoiceData) = voice data to store</ret>
	</rets>
</function>