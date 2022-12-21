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
        ./vendor/bin/sail artisan migrate
        ```
    - Truncate database
        ```
        ./vendor/bin/sail artisan migrate:fresh
        ```
    - Run the shell with tinker
        ```sh
        ./vendor/bin/sail artisan tinker
        ```
    - Run the unit tests
        ```
        ./vendor/bin/sail artisan test
        ```

- Sync planets
    - sync all planets
        ```sh
        ./vendor/bin/sail artisan planets:sync
        ```
    - sync specific planet by ID
        ```sh
        # ./vendor/bin/sail artisan planets:sync {planet_id}
        ./vendor/bin/sail artisan planets:sync 2
        ```
