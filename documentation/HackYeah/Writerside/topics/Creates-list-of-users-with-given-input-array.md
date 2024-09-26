# Logowanie

<api-endpoint openapi-path="./../openapi.yaml" endpoint="/login" method="post">
<response type="200">

<sample>
{
    "token": "66f3eb50ca2ef9.48849556",
    "userdata": {
        "id": 1,
        "username": "Walen",
        "email": "lubimyHejj@pie.pl",
        "points": 0,
        "two_factor": false,
        "created": "2024-09-25T10:48:47+00:00",
        "verified": false,
        "permission_level": 0
    }
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
<response type="401">

<sample>
    {
     "message": "Invalid username or password"
    }
</sample>

</response>
<response type="500">

<sample>
    {
     "message": "Something went wrong"
    }
</sample>

</response>

</api-endpoint>
