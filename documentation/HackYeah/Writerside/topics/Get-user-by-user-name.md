# Znajdywanie danych (publicznych) użytkownika

<api-endpoint openapi-path="./../openapi.yaml" endpoint="/users/{id}" method="get">
<response type="200">
<sample>
    {
        "id": 2137,
        "username": "Waleń",
        "points": 420 
    }
</sample>
</response>
<response type="400">
<sample>
    {
        "message": "Invalid Query"
    }
</sample>
</response>
<response type="404">
<sample>
    {
        "message": "User has not been found"
    }
</sample>
</response>
</api-endpoint>
