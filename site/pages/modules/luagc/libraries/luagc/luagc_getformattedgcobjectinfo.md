<function name="GetFormattedGCObjectInfo" parent="luagc" type="libraryfunc">
	<description>
		Returns a nicely formatted table showing which fields store which GC references for the given object.<br>
		<note>
			Fields are not consistent and can be **nil** always check if a field exists!
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="object" type="any">Object to return information on</arg>
	</args>
	<rets>
		<ret name="informations" type="table"></ret>
	</rets>
</function>

<example>
	<description></description>
	<code>
function test()
end
debug.setfenv(test, {hai = ":3"})

local formatted = luagc.GetFormattedGCObjectInfo(test)
PrintTable(formatted)
PrintTable(formatted.proto) -- Let's also see the proto
	</code>
	<output>
["environment"]:
                ["hai"] =       :3
["object"]      =       function: 0xf09e29f2
["proto"]       =       proto: 0xf0898ae2
["type"]        =       function
["upvalues"]:

["constants"]:
["name"]        =       @lua_run
["object"]      =       proto: 0xefabbfb2
["type"]        =       proto
	</output>
</example>