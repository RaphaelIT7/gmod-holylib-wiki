<function name="GetLagThreshold" parent="physenv" type="libraryfunc">
	<description>
		Returns the lag threshold.
		<note>
			Only works on Linux32
		</note>
		<added version="0.7"></added>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="LagThreshold" type="number"> Lag threshold in milliseconds (10^-3)</ret>
	</rets>
</function>