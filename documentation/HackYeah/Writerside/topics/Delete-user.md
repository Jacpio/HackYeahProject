# Usuwanie użytkownika

<api-endpoint openapi-path="./../openapi.yaml" endpoint="/users/{id}" method="delete">
<request>
<sample title="HTTP">
    GET /api/users/{username} HTTP/1.1
    Host: IP4_Adress:8765
    Authorization: {token}
</sample>
</request>
<response type="200">
<sample>
{
    "message": "User has been deleted"
}
</sample>
</response>
<response type="400">
<sample>
{
    "message": "Invalid token or query"
}
</sample>
</response>
<response type="404">
<sample>
{
    "message": "Invalid id"
}
</sample>
</response>
</api-endpoint>
