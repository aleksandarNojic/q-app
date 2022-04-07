## Q task README file

After the project is cloned 

# The keys from ***.env.example*** file should be copied to newly created ***.env** file
# and you should fill some of them

# For example We are using this keys for creating authors command were we need authentication
> ADMIN_EMAIL=ahsoka.tano@q.agency
> ADMIN_PASSWORD=Kryze4President

# By default it is 5 minutes, you can set different value if you like
> SESSION_LIFETIME

# The command for creating authors, it will create 2 authors by default
# if you need more than 2, just add the number at the end of the command

> php artisan create:authors
> OR
> php artisan create:authors 10

# Run local server
> php artisan serve
