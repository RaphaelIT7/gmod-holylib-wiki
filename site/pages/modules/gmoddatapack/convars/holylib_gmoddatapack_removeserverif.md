<function name="holylib_gmoddatapack_removeserverif" parent="" type="libraryfield">
    <description>
		If enabled, server code will be removed from the lua files before they are sent to clients.<br>
		Currently this only works for `if SERVER then` or `elseif SERVER then`, yes you can use `( )` but if you do `if !CLIENT then` it won't recognize it!<br>
		<added version="0.8"></added>
    </description>
    <value>0</value>
    <realm>Server</realm>
</function>