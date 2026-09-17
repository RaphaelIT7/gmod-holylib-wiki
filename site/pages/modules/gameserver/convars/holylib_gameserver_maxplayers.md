<type name="holylib_gameserver_maxplayers" category="" is="convar">
	<summary>
		# holylib_gameserver_maxplayers = 128
		Experimental - max client limit (above 255 cannot be networked, though may work if they remain purely as a `CGameClient`, e.g. HolyLib's queue clients, see <page>gameserver.GetFreeQueueClient</page>).<br>
		Clamped between `1` and `8192`.
	</summary>
</type>