# Planets Explorer
It represents the testing brief of the imaginary application called Planets Explorer. You have woken up at an unknown planet. Everywhere you look you see only desert. You have some supplies in your ship, but the engines are gone. You must quickly identify where you are and try to call for help. You have access to the very old API: https://swapi.py4e.com/ with the basic data of all the planets in the known universe. In the ship, only old computer from the previous millennia, with old school so-called "Internet" technology is working. 

## Getting started

- Run locally without container
    ```
    php artisan serve
    ```
- Run with container (sail)
    - Start containers
        ```
        ./vendor/bin/sail up -d
        ```
    - Stop containers
        ```
        ./vendor/bin/sail stop
        ```
    - Remove containers
        ```
        ./vendor/bin/sail down
        ```
    - Rebuild containers
        ```sh
        ./vendor/bin/sail build --no-cache
        ```
    - Run publicly with sail
        ```
        ./vendor/bin/sail share
        ```
    - Run migrate
        ```
        php artisan migrate
        ```
    - Truncate database
        ```
        php artisan migrate:fresh
        ```
    - Run the shell with tinker
        ```sh
        php artisan tinker
        ```
    - Run the unit tests
        ```
        php artisan test
        ```

- Sync planets
    - sync all planets
        ```sh
        php artisan planets:sync
        ```
    - sync specific planet by ID
        ```sh
        # php artisan planets:sync {planet_id}
        php artisan planets:sync 2
        ```
