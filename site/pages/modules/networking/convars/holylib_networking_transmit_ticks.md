<function name="holylib_networking_transmit_ticks" parent="" type="libraryfield">
    <description>
        How many ticks to use for `holylib_networking_transmit_newweapons` & `holylib_networking_transmit_onfullupdate`.<br>
        `-1` will instead ensure they are networked until the client acknowledges them, based on the client's max acknowledged tick count, rather than using a fixed tick count. This is more accurate but relies on being able to look up the player's `CBaseClient`; if that lookup fails, it falls back to a fixed window of 100 ticks in the past.<br>
        Any other value is used as a fixed number of ticks counted back from the current tick.
    </description>
    <value>-1</value>
    <realm>Server</realm>
</function>
