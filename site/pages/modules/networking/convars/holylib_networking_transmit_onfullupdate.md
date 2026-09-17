<function name="holylib_networking_transmit_onfullupdate" parent="" type="libraryfield">
    <description>
        If enabled, players and their own weapons are transmitted for the first x ticks when they had a full update.<br>
        While a player is within their own full-update window (see `holylib_networking_transmit_ticks`), all of their weapons are transmitted to themselves every tick, and every other player entity is force-transmitted to them so they immediately know about everyone on the server.<br>
        If the recipient isn't the one in a full update, `holylib_networking_transmit_onfullupdate_networktoothers` decides whether other players who are currently in a full update get force-transmitted to them as well.
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>
