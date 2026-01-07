<function name="GetAllGCObjects" parent="luagc" type="libraryfunc">
	<description>
		Returns a table containing all GCobjects.<br>
		The GClist **always** goes from newest to oldest GCobjects due to how the GCobjects are chained.<br>
		<note>
			This function itself create a table which is why doing<br>
			`luagc.GetAllGCObjects(luagc.GetCurrentGCHeadObject())`<br>
			Will always have 1 object - which is the returned table.<br>
			You can do `table.remove(gcList, 1)` to remove the first entry to get rid of it.<br>
		</note>
		<added version="0.8"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="targetObject" type="any">
			If given a `targetObject` object, it will return all GCobjects until it reached the `targetObject` after which it'll stop.<br>
			(the `targetObject` **won't** be included in the result!)
		</arg>
	</args>
	<rets>
		<ret name="objects" type="table"></ret>
	</rets>
</function>

<example>
	<description>An example usage</description>
	<code>
collectgarbage("stop") -- to not modify gc list
local gcHead = luagc.GetCurrentGCHeadObject()

function Example() -- 1 GCfunction
  return {}
end
Example() -- Returns 1 GCtable
debug.setfenv(Example, {}) -- to avoid printing _G below - also creates 1 GCtable

-- Now print all new GC objects created by our code above
local gcList = luagc.GetAllGCObjects(gcHead)
table.remove(gcList, 1) -- remove the gcList table from itself since it included as the first entry.

for _, gcObject in ipairs(gcList) do
	print("object: " .. tostring(gcObject) .. " (type: " .. type(gcObject) .. ")") 
end
	</code>
	<output>
object: table: 0xf0b9fdea (type: table)
object: table: 0xf09ffc3a (type: table)
object: function: 0xf0bf9cb2 (type: function)
	</output>
</example>