<function name="SetPreventTransmitBulk" parent="pvs" type="libraryfunc">
	<description>
		Adds the given Entity to be transmitted.
		<note>
			Only use this function inside the <page>HolyLib:PreCheckTransmit</page> hook!  
		</note>
		<added version="0.3"></added>
	</description>
	<realm>Server</realm>
	<args>
		<arg name="ents" type="table">
			A sequential table containing all the entities that should be affected.<br>
			Can be a single <page>Entity</page>
		</arg>
		<arg name="plys" type="table">
			A sequential table containing all the players that it should set it for.<br>
			Can be a single <page>Player</page> or a <page>RecipientFilter</page>
		</arg>
		<arg name="notransmit" type="boolean" default="false">If the entity should stop being transmitted.  </arg>
	</args>
</function>