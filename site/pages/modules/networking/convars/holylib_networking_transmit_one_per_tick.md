<function name="holylib_networking_transmit_one_per_tick" parent="" type="libraryfield">
    <description>
        If enabled, one additional weapon is networked per tick, the slot always changes rotating through all weapons.<br>
        This allows you to have `holylib_networking_transmit_all_weapons` and `holylib_networking_transmit_all_weapons_to_owner` but still allow others to receive all weapons of a player over time.<br>
        This helps to reduce networking cost as networking all weapons of every player is very expensive easily being the most expensive thing<br>
        Setting it to `1` causes it to network the additional weapon to **all** players<br>
        Setting it to `2` causes it to network the additional weapon **only** to the owner<br>
        <added version="0.8"></added>
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>