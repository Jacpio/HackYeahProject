# Tworzenie użytkownika

<api-endpoint openapi-path="./../openapi.yaml" endpoint="/users" method="post">

<request>

<sample>
{
  "username": "Waleń",
  "email": "LubimyHejj@pie.pl",
  "password": "Super_tajne_hasło"
  "two_factor": 1 (or 0)
}
</sample>

</request>

<response type="201">

<sample>
    {
        "message": "User has been created"
    }
</sample>

</response>
<response type="400">

<sample>
    {
        "message": "User has not been created"
    }
</sample>

</response>

</api-endpoint>
