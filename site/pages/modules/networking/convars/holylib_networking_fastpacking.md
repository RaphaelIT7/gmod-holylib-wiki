<function name="holylib_networking_fastpacking" parent="" type="libraryfield">
    <description>
        Makes `PackEntities_Normal` slightly faster.<br>
        Replaces the engine's `PackEntities_Normal` with a version that only packs entities that were actually transmitted to at least one client this tick, instead of unconditionally packing every valid entity in the snapshot.<br>
        Only takes effect while `holylib_networking_fasttransmit` is also enabled.
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>
