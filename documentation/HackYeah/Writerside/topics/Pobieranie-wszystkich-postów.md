# Pobieranie wszystkich postów

<api-endpoint openapi-path="./../openapi.yaml" endpoint="/expenses/{user_id}" method="get">
<response type="200">
<sample>
        [
            {
                "id": 1,
                "name": "Wyjazd do norwegii",
                "currency": 2500.50,
                "e_category": {
                    "id": 20,
                    "name": "Travel"
                }
            },
            {
                "id": 2,
                "name": "Badania lekarsie",
                "currency": 200.2,
                "e_category": {
                    "id": 5,
                    "name": "Doctor Visits"
                }
            }
        ]
</sample>
</response>
<response type="401">
<sample>
    {
        "message": "Not Authorized"
    }
</sample>
</response>
<response type="404">
<sample>
    {
        "message": "Expenses have not been found"
    }
</sample>
</response>
</api-endpoint>
