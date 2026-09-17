<function name="holylib_networking_fastcharactertransmit" parent="" type="libraryfield">
    <description>
        Experimental.<br>
        Enables the replacement of `CBaseCombatCharacter::SetTransmit` for players, which is what actually applies `holylib_networking_bind_gmodhands_to_player`, `holylib_networking_bind_viewmodels_to_player`, `holylib_networking_transmit_all_weapons`, `holylib_networking_transmit_all_weapons_to_owner`, `holylib_networking_transmit_one_per_tick`, `holylib_networking_transmit_newweapons` and `holylib_networking_transmit_onfullupdate`.<br>
        It's also what pre-marks a player's hands, viewmodels and weapons as never needing a PVS check, since they're bound directly to the player instead.<br>
        If disabled, the engine's default character transmit behavior is used instead and all of the convars listed above have no effect.
    </description>
    <value>1</value>
    <realm>Server</realm>
</function>
