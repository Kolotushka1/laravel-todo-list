## laravel-todo-list
Todo-List реализованный на Framework Laravel

## **Для развертывания поднадобится установить Docker**
После выполнить команду
```
docker compose up
```
Env.example -> переименовать в env и настроить БД (создать в Adminer)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-10-task-list
DB_USERNAME=root
DB_PASSWORD=root
```
Затем заполнить базу данным данными
```
php artisan migrate
php artisan db:seed
```
Можно воспользоватья проектом!

## **Базовый функционал**
127.0.0.1:8000/tasks/ -> просмотр страниц

127.0.0.1:8000/tasks/23 -> просмотр определенной записи

127.0.0.1:8000/tasks/create -> создание записи

127.0.0.1:8000/tasks/8/edit -> изменение записи
