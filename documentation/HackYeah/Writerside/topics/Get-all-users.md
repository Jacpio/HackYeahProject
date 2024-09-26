# Znajdywanie danych (publicznych) wszystkich użytkowników

<api-endpoint openapi-path="./../openapi.yaml" endpoint="/users" method="get">
<response type="200">
<sample>
        [
            {
                "id": 2137,
                "username": "Waleń",
                "points": 420 
            }
        ]
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
        "message": "Users have not been found"
    }
</sample>
</response>
</api-endpoint>
