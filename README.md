
# NFQ E-commerce Software Engineering Internship 

This system is developed using the PHP language framework Laravel (8.83.6). The MySql DB engine is used for data storage. 

## Technical solutions
- MVC laravel principles. System use Model Objects to manipulate data in data layer, Controller objects are used to make logical operations with requests, Views responsible for front-end part.

- One To Many Relationships: Model Project has many -> Group models, Group model -> has many Student models. This solution allows to get all groups that belong to a project as well as get all students that belong to certain groups.

- System use arrilot / laravel-widgets package to update data in status page every 10 seconds.
- For RESTful api system use common laravel resource object
- Automated tests are made with PHPunit
- Front-end is made using bootstrap framework.


## Requirements
- PHP
- MySql DB
- Composer

## Application set up

1. Clone Github repo:

```bash
  git clone https://github.com/RafalKLab/TeacherSystem
```

2. Navigate to the project folder

```bash
  cd TeacherSystem
```

3. Install Composer dependencies

```bash
  composer install
```

4. Įdiekite NPM priklausomybes

```bash
  npm install
```

5. Make a copy of .env.example file

```bash
  cp .env.example .env
```

6. Generate app encryption key

```bash
  php artisan key:generate
```

7. Create a new database for the system
8. Add the information from the newly created database to the .env file

`DB_DATABASE` = databse name 

`DB_USERNAME` = databse user

`DB_USERNAME` = databse password

Example
```
DB_DATABASE=teacherSystem
DB_USERNAME=root
DB_PASSWORD=
```

9. Move the migration tables to the database

```bash
  php artisan migrate
```

## Application tests
Inside the project folder, use the command:

```bash
  php artisan test
```


    
## Launch application

Inside the project folder, use the command:

```bash
  php artisan serve
```


## Authors

- [@RafalKLab](https://github.com/RafalKLab)

