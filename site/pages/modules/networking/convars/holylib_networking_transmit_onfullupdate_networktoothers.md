<function name="holylib_networking_transmit_onfullupdate_networktoothers" parent="" type="libraryfield">
    <description>
        If enabled, any player that has a full update will be networked to everyone.<br>
        This makes sure that whenever a player requests/receives a full update, every other client immediately gets that player's entity force-transmitted to them too, instead of waiting for a regular PVS-based transmit, keeping everyone's knowledge of connected players in sync.<br>
        Only checked when `holylib_networking_transmit_onfullupdate` is enabled and the transmit's own recipient isn't the one currently in a full update.
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>
