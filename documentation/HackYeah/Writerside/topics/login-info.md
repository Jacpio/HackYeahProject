# Pobieranie informacji (prywatnych) użytkownika
<api-endpoint openapi-path="../openapi.yaml" endpoint="/login/{id}" method="GET">
<request>
<sample title="HTTP">
    GET /api/users/{username} HTTP/1.1
    Host: IP4_Adress:8765
    Authorization: fwhfh27g6dgqw
</sample>
</request>
<response type="200">
<sample>
{
    "id": 1,
    "username": "Waleń",
    "email": "LubimyHejj@pie.pl",
    "verified": true (or false)
}
</sample>
</response>
<response type="400">
<sample>
{
    "message": "Invalid query or token"
}
</sample>
</response>
<response type="404">
<sample>
{
    "message": "Invalid username"
}
</sample>
</response>
</api-endpoint>