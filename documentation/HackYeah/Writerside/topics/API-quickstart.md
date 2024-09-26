# API Szybki Tutorial

Znajdziesz tutaj poradnik krok po kroku jak obsługiwać to API
## Authentication - Uwierzytelnianie

### Sposobem uwierzytelniania jest podawanie tokenu w ciele zapytania. Token będzie zwracany, podczas logowania

## Wysyłanie żądań

```http
GET /api/users/test HTTP/1.1
Host: IP4_Adress:8765
```
Musi zwrócić status: 200

## Response Handling - Obsługa odpowiedzi
    status: 200 - OK
    status: 201 - Zapisano wysłany zasób
    status: 400 - Nie prawidłowe zapytanie
    status: 401 - Nie autoryzowany dostęp
    status: 403 - Zabroniony dostęp do zasobów
    status: 404 - Nie znaleziono zasobów
    status: 405 - Nie dozwolona metoda
    status: 500 - Wewnętrzny błąd serwera


[//]: # (## API Usage Tips)

[//]: # (Offer tips and best practices for using the API effectively and efficiently.)