# Developer Test

This application was developed using the Laravel framework.

After cloning the repository and performing composer install, you can choose to use sail, in this case you can use the scripts:

-   up
-   down
    To start and end the sail.
    Don't forget to give the necessary permissions.

When performing the database migration and seed, you will have created two users:

-   admin@admin
-   user@user
    Using by default password 123456, but you can change it on seeder file.

When accessing localhost you will have the login page, and you can use one of the two users created during the seeder

The application will query the API and return the list of artists.
When requesting to see an artist's albums, the application will query the API again, but this does not return a list of the artist's albums, only his data. So if there is no album by this artist in the database, we mock 10 register to show.

So if you're using the regular user, you'll see the albums and be able to make changes to the data.
If you are using admin, you can also delete records
