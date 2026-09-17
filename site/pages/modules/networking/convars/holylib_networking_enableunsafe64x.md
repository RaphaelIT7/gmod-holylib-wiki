<function name="holylib_networking_enableunsafe64x" parent="" type="libraryfield">
    <description>
        (only affects 64x) Enables 64x the full module code though it may crash on 64x.<br>
        This convar only exists on x86-64 builds. On 64x, most of this module's detours (everything besides the `AllocChangeFrameList` replacement, which is x86-only anyway) are considered unsafe and are skipped entirely during setup.<br>
        Enabling this forces them to be installed anyway. It exists so the 64x support work can be tested, and is not meant to be enabled on a production server.
    </description>
    <value>0</value>
    <realm>Server</realm>
</function>
