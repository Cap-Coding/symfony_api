# Symfony 5 CRUD API service

Please watch the whole video tutorial [here](https://www.youtube.com/watch?v=tbXpX4dAqjg)

Create a customer:

```sh
curl --location --request POST 'http://localhost:8080/api/v1/customers' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": "test.email@gmail.com",
    "phoneNumber": "+49116012345678"
}'
```

Create a product:

```sh
curl --location --request POST 'http://localhost:8080/api/v1/products' \
--header 'Content-Type: application/json' \
--data-raw '{
    "code": "test_code",
    "title": "Test title",
    "price": 1234
}'
```

Create a cart:

```sh
curl --location --request POST 'http://localhost:8080/api/v1/customers/cart' \
--header 'Content-Type: application/json' \
--data-raw '{
    "customer": 1,
    "products": [
        1
    ],
    "dateTime": "2020-08-05 12:15:00"
}'
```
