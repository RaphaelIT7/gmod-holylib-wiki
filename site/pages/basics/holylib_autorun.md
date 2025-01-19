<title>Holylib Autorun</title>

# Autorun
Holylib loads and runs all files inside the `lua/autorun/_holylib` folder before any other script, allowing you to setup things like filesystem.<br>
As a example, you can use the <page>filesystem.AddSearchPath</page> and <page>filesystem.RemoveSearchPath</page> functions to add/remove addons before they are loaded.  

<note>
	When a script is loaded, **only** the C++ side is set up/ready as **no** lua scripts executed yet.<br>
	Therefore, no lua functions will exist yet/won't be usable.
</note>