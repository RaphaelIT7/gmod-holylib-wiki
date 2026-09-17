<function name="GetPhysSkipType" parent="physenv" type="libraryfunc">
	<description>
		Returns the currently set skip type, see <page>physenv.SetPhysSkipType</page>.<br>
		This is reset to `physenv.IVP_None` (`-1`) at the start of every simulation step.
		<note>
			Only works on Linux32
		</note>
	</description>
	<realm>Server</realm>
	<rets>
		<ret name="" type="number"> One of the `IVP_*` enums.</ret>
	</rets>
</function>
