<function name="IsEmptyBaseline" parent="pvs" type="libraryfunc">
	<description>
		Returns `true` if the baseline is empty.
		<note>
			Only use this function inside the <page>HolyLib:PreCheckTransmit</page> or <page>HolyLib:PostCheckTransmit</page> hook!
		</note>
		<added version="0.3"></added>
		<removed>
			This function was removed since I can't get it to work / It would be a bit more complicated than first anticipated.
		</removed>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="isEmpty" type="boolean">`true` when the baseline is empty</ret>
	</rets>
</function>