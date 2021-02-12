# Books

This is a basic SaaS application for a user to login and keep track of books to read.
A user can add, update, or remove books from their list.
A user can also sort the list of books by column or change the read order.
A user can also get a list of details for a book by clicking the book on the list (same as updating the book).

## Public Api

The application can be accessed via REST API

| Verb      | Endpoint                              | Description                       | Middleware    | Parameters                |
|:--------- |:------------------------------------- |:--------------------------------- |:------------- |:--------------------------|
| GET       | /api/books                            | get list of auth users books      | auth:sanctum  | ?sort_on=title            |
|           |                                       |                                   |               | ?sort_direction=DESC      |
| GET       | /api/books/{bookId}                   | get a single book                 | auth:sanctum  |                           |
| POST      | /api/books                            | create a book                     | auth:sanctum  | title=new book            |
|           |                                       |                                   |               | author=new author         |
|           |                                       |                                   |               | published_on=2021-01-01   |
| PUT       | /api/books/{bookId}                   | update a book                     | auth:sanctum  | title=new book            |
|           |                                       |                                   |               | author=new author         |
|           |                                       |                                   |               | published_on=2021-01-01   |
| DELETE    | /api/books/{bookId}                   | delete a single book              | auth:sanctum  |                           |

## Postman Collection

Please use the attached postman collection `books.postman_collection.json` in the root of the project directory to interact with the REST API.
The postman collection makes use of a pre-request script and collection variables to interact with laravel sanctum authentication.
The collection variable {{host}} should be updated if the application is not running on http://localhost or running on a different port.
Use the login method to set the collection cookies for session and csrf tokens

[Postman Import](https://learning.postman.com/docs/getting-started/importing-and-exporting-data/#importing-data-into-postman)

## Web Application

The web application makes use of [laravel jetstream](https://jetstream.laravel.com/2.x/introduction.html) and [inertia](https://inertiajs.com/) for a Modern Monolith Vue front-end SPA

## Tests

Tests are avilable for the book resource in the test directory
```sh
$ ./vessel test
```

## Deployment

