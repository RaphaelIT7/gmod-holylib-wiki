<function name="holylib_networking_transmit_newweapons" parent="" type="libraryfield">
    <description>
        If enabled, weapons that a player equipped/was given are networked for the first x ticks.<br>
        A weapon counts as "new" for `holylib_networking_transmit_ticks` ticks after it was created or assigned to that weapon slot (or, when `holylib_networking_transmit_ticks` is `-1`, until the client has acknowledged it), during which it's always transmitted to its owner regardless of the active-weapon or `holylib_networking_transmit_one_per_tick` rotation.<br>
        This guarantees a player always knows which weapons they own without needing constant per-tick updates for all of them.<br>
        Only takes effect while `holylib_networking_fastcharactertransmit` is enabled.
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>
