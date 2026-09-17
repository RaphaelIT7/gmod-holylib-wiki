<function name="holylib_networking_cachedump" parent="" type="libraryfield">
    <description>
        Debug. You wouldn't need this...<br>
        When enabled, the next entity transmit cache update dumps its full state to the console: the full-check entity list, the PVS entity list, the never-/always-transmit bitmasks, the `holylib_networking_areasplit` area lists, the entire entity cache and, if `holylib_networking_fastcharactertransmit` is enabled, every player's bound hands/viewmodel/weapon handles.<br>
        It automatically resets itself back to `0` again after the dump, so it only triggers a single dump per toggle.
    </description>
    <value>0</value>
    <realm>Server</realm>
</function>
