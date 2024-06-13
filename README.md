# Store

## Описание проекта

API для работы с продуктами

## Ссылки:

### [Методы API](store/api_v1.md)

### [Файл с набором запросов и параметров в Postman](store/store.postman_collection.json)

## Инструкция по установке

1. Клонируйте репозиторий:
    ```sh
    $ git clone https://github.com/Zhenya1907/rs.git
    ```
2. Перейдите в проект:
    ```sh
    $ cd rs/store
    ```
3. Переименуйте файл с настройками проекта:
    ```sh
    $ cp .env.example .env
    ```
4. Запустите Docker:
    ```sh
    $ docker-compose up -d
    ```
5. Выполните миграции базы данных и установку первоначальных данных:
    ```sh
    $ docker-compose exec "app" php artisan migrate --seed
   ```



