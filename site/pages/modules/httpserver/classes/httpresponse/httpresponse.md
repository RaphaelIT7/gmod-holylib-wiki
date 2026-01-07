<type name="HttpResponse" category="classfunc" is="class">
	<summary>
# HttpResponse

This class formerly represented the HttpResponse that is created when a incoming request is received but in 0.8 had it's `Set` functions merged into the <page>HttpRequest</page> for simplicity<br>
This class now is only used in the callback of <page>HttpServer:AddPreparedResponse</page><br>

<added version="0.7"></added>

| Metatable function | Description |
|-------|------|
| `__tostring` | Returns a formated string of the HttpResponse -> `HttpResponse` |
| `__index` | Used to find the functions on the metatable and access saved variables |
| `__newindex` | Used to allow one to save variables on the object |
	</summary>
</type>