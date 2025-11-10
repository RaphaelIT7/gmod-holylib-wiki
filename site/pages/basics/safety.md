<title>Safety</title>

# Safety
Since HolyLib provides and exposes deep engine functions, it is not guaranteed to be safe, not all functions validate given input!<br>
There are plans to improve safety by locking things behind the `-holylib_allowunsafe` commandline argument which was only added recently and is barelly implemented!<br>
If there are any functions that should be locked behind it, please let me know as I might miss them.<br>
On Linux unsafe code is allowed by default, on windows it is blocked as were on a client and do not want to risk anything.<br>
You can disable unsafe code on linux using `-holylib_denyunsafe`<br>