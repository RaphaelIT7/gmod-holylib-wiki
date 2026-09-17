<function name="holylib_networking_areasplit" parent="" type="libraryfield">
    <description>
        PVS entities are split into areas.<br>
        Instead of running every PVS-checked entity through a full PVS check for every client, entities are first bucketed by the map area they're in. A client's transmit check then first asks whether its own area even connects to that area before checking any of the entities inside it, drastically reducing the amount of PVS checks on maps with many areas.<br>
        Each area can hold up to 512 entities before it overflows back into the regular flat PVS list.<br>
        Only takes effect while `holylib_networking_fasttransmit` is enabled.
    </description>
    <value>0</value>
    <realm>Server</realm>
</function>
