# How to build simple CRUD API service with Symfony 5 (for beginners)

Please watch the whole video tutorial [here](https://youtu.be/tbXpX4dAqjg)

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


# Other video tutorials

## Code faster with Github Copilot

There is a [video](https://youtu.be/qyxJXNNvd70)

## Create a classic website using Symfony 5

There is a [video](https://youtu.be/svAxl6U8akQ)

## Delay "heavy" tasks in Symfony with component Messenger

There is a [video](https://youtu.be/UHlA5nHdCmw)

## Delay heavy tasks in Symfony with kernel.terminate event to decrease response time

There is a [video](https://youtu.be/HrQme9KUlUg)

## Create Symfony 5 project with Docker and Postgres

There is a [video](https://youtu.be/4UrPI6Y3BWA)

## Design pattern "Chain of responsibility" (Symfony implementation)

There is a [video](https://youtu.be/3KQlubIv684)

## How to use data transfer objects (DTO) in Symfony API application

There is a [branch](https://github.com/Cap-Coding/symfony_api/tree/data_transfer_objects) and here is a [video](https://youtu.be/XxIhzgGv214)

## How to build simple CRUD API service with Symfony 5 (for beginners)

There is a [branch](https://github.com/Cap-Coding/symfony_api/tree/crud_api) and here is a [video](https://youtu.be/tbXpX4dAqjg)

## How to use Symfony Form Events in API service

There is a [video](https://youtu.be/lLwx96DA_Ww)

## How to use object factories with Symfony Forms

There is a [video](https://youtu.be/chgvsi6TWM8)

## Dockerize WordPress

There is a [video](https://youtu.be/coqucs1UhMY)

## Get trusted SSL certificate (https) for free with Let's Encrypt and Certbot

There is a [video](https://youtu.be/nFDk43tAKFQ)
