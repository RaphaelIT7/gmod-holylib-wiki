<function name="IsProximityHearingClient" parent="CBaseClient" type="classfunc">
	<description>
		Works like <page>voicechat.IsProximityHearingClient</page> but only takes the direct player slot.
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="playerSlot" type="number"></arg>
	</args>
	<rets>
		<ret name="hearing" type="boolean"></ret>
	</rets>
</function>