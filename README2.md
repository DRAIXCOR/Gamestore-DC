para ver el framework se usan Rutas Absolutas para lo del diseño del proyecto 2

si les da un problema al hacer migracion primero eliminen la tabla plataforma y juegos en la base de datos luego en consola pongan php artisan migrate:reset

despues php artisan migrate --path=/database/migrations/2024_02_15_045501_create_plataformas_table.php

y ya hacen el php artisan migrate eso deberia resolver el problema en caso de que pase o se borren las migraciones
