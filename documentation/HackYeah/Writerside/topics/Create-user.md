# Tworzenie użytkownika

<api-endpoint openapi-path="./../openapi.yaml" endpoint="/users" method="post">

<request>

<sample title="Basic Query">
{
  "username": "Waleń",
  "email": "LubimyHejj@pie.pl",
  "password": "Super_tajne_hasło"
  "two_factor": true (or false)
  "is_adult": true (or false)
  "is_family": true (or false) 
}
</sample>
<sample title="Joining to the family">
{
  "username": "Waleń",
  "email": "LubimyHejj@pie.pl",
  "password": "Super_tajne_hasło"
  "two_factor": true (or false)
  "is_adult": true (or false)
  "family_id": 2
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
