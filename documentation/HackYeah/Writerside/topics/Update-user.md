# Edytowanie nazwy użytkownika

<!-- Use multiple <sample> elements inside <request> to provide samples for various programming languages. 
They will be placed in tabs.Developers can use these samples as templates when making requests to this endpoint. -->

<api-endpoint openapi-path="./../openapi.yaml" endpoint="/login/{id}" method="put">

<request>

<sample title="HTTP">
    GET /api/login/{username} HTTP/1.1
    Host: IP4_Adress:8765
    Authorization: {token}
</sample>

</request>

<response type="201">
<sample>
{
    "message": "User has been edited"
}
</sample>

</response>
<response type="400">

<sample>
{
    "message": "Invalid query"
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
