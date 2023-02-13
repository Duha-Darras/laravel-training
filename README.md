# laravel-training

## Part 1: Installation
To work with Laravel w need to setup the following installation:
-	Download XAMPP for PHP and MySQL: https://www.apachefriends.org/
-	Download Visual Studio Code: https://code.visualstudio.com/
-	For package dependency management install Composer: https://getcomposer.org/
-	Also install NodeJS: https://nodejs.org/en/
-	For version control we will use GitHub:
	create account: https://github.com/
    download GitHub Desktop: https://desktop.github.com/

Note 1: you can download standalone PHP and MySQL server with any management tool.
Note 2: you can use any IDE rather than VSCode such as sublime text, Atom, and PhpStorm, 
Note 3: the Apache server is used for running the MySQL management tool (PhpMyAdmin)
Note 4: Laravel has its own server for development so there is no need to put the project folder under the Apache/htdocs folder 

## Part 2: Starting with Laravel 
 -	open VSCode
 -	Open terminal 
 -	Run command: composer create-project laravel/laravel laravel-training
 -	create GitHub repository with same name and location of the project
 -	publish this repo
 -	check GitHub and make sure that the files are uploaded
 -	open the folder in VSCode 
 -	delete the folder 
 -	go to GitHub and this time choose clone repo and clone the Laravel-training repo
 -	open in VSCode note that .env file and vendor folder are no longer existing 
 -	in terminal run ( composer install ) now the vendor folder appears 
 -  for .env file make a copy form .env.example file and rename it to .env 
 -	run command: php artisan key:generate
 -	run command: php artisan serve
 -	create a copy of resources/views/welcome.blade.php and rename it to mypage
 -	modify the page content 
 -	go to routes/web.php change the view name to mypage 
 <pre>
 Route::get('/', function () {
    return view('home');
}); 

To 

Route::get('/', function () {
    return view('mypage');
});
</pre>
 -	now refresh the page 
 -	in route/web.php change the route URI to mypage 

<pre>
Route::get('/', function () {
    return view('mypage');
});

To 

Route::get('/mypage', function () {
    return view('mypage');
});
</pre>
## Part 3: Laravel MVC 
Model-view-controller (MVC) is a software architectural pattern commonly used to develop web applications containing user interfaces. This pattern divides the application into three interconnected elements.
* **Model** contains the business logic of the application. For example, the Online Store application product data and its functions.
* **View** contains the application’s user interface. For example, a view to register products or users.
* **Controller** acts as an interface between model and view elements. For example, a product controller collects information from a “create product” view and passes it to the product model to be stored in the database.

![Laravel MVC](/public/mvc.png)

## Part 4: Laravel Routes
In Laravel, the Route class is used to define the routes for a web application. It provides a simple and convenient way to define URLs, HTTP methods, and controllers or closure functions that should handle the incoming requests.
If you open the **routes/web.php** file you will find the following code:

<pre>
Route::get('/', function () {
    return view('welcome');
});
</pre>

This example creates a route that matches the root URL of the application and returns a view named "welcome". The get method is used to specify that the route should only match GET requests.
Laravel also provides several other methods on the Route class, such as post, put, patch, delete, options, and any, that you can use to define routes that match different HTTP methods
<pre>
Route::get();
Route::post();
Route::patch();
Route::put();
Route::delete();
Route::any();

</pre>

Try:
<pre>
Route::get('/welcome', function () {
return 'welcome';
});

Route::get('/hello', function () {
echo '&lt;h1>Hello&lt;/h1>';
});

</pre>

**Routes parameters**
In Laravel, you can pass parameters to your routes to capture dynamic values in the URL. This allows you to create dynamic and flexible URLs that can be used to retrieve specific data based on the parameters provided.

<pre>
Route::get( 'hello/{name}', function ($name){
echo "Hello " . $name;
});

Route::get( 'hello/{name}/{lastname?}', function ($name, $lname = " "){
echo "Hello " . $name . " " . $lname ;
});

Route::get( 'hello/{name}/{fname?}', function ($x, $y="test"){
            echo "Hello " . $x . " " . $y;
            });

</pre>

**Note**: the ? means optional parameter

**Grouping routes**
Grouping routes in Laravel allows you to organize and structure your routes in a more meaningful and efficient way. By grouping routes, you can apply common behavior or configurations to multiple routes at once, which can help reduce code duplication and improve the maintainability of your application.

<pre> 
Route::group(['prefix'=>'home'], function()
{
Route::get('/', function () {
    return view('home');
});
Route::get('/account', function () {
    return view('account');
});
Route::get('/signup',function () {
    return view('signup');
});
});

</pre>

**Named routes**
Naming routes in Laravel is useful for several reasons:

- Improved readability: By giving routes descriptive names, it makes your code more readable and understandable, especially for developers who may be unfamiliar with your codebase.
- Ease of maintenance: Named routes make it easier to update your application if you need to change the URL structure. Instead of searching through your code for hardcoded URLs, you can update the route definition in one place, and the change will be reflected throughout your application.
- URL generation: Named routes allow you to generate URLs programmatically, without having to hardcode them in your application. For example, you can generate a URL to a named route in your Blade templates or in your controllers using the route helper function. This can make your application more flexible and resilient to changes.

<pre>
Route::group(['prefix' => 'home'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::get('/account', function () {
        return view('account');
    })->name('home.account');
    Route::get('/signup', function () {
        return view('signup');
    })->name('home.signup');
});

</pre>
In home.blade add the following

<pre>
 &lt;h2 style="color:black; text-align: center" >&lt;a href="{{ route('home.signup') }}"> Signup with route name&lt;/a>&lt;/h2>
 &lt;h2 style="color:black; text-align: center" >&lt;a href="{{ url('home/signup') }}"> Signup with route url &lt;/a>&lt;/h2>
</pre>


Then in routes/web.php change the signup route URI to sign-up and check which one of these links is still working

Note: The route method takes the name of the route, while the url method take the URI of the route
Note: The **{{ }}** syntax in Laravel Blade is used to print a value or expression in a Blade template. **{{ $name}}** is equal to **<?php echo $name ?>**
 
## Part 5: Laravel Controllers
Controllers are classes that help manage HTTP requests and provide responses to these requests. Controllers in Laravel are used to manage the flow of data between the model (which handles database logic) and the view (which displays the user interface). When a user makes an HTTP request, Laravel maps the request to a specific controller method and the method is executed to handle the request and return a response.
To create controller use command: **php artisan make:controller HomeController**
The controller naming convention is pascal case where the word Controller is added at the end of the name
<pre>
&lt;?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
}

</pre>
Note that any created controller should extends the Controller class 

Add methods to return views:
<pre>
 public function index()
    {
        return view('home');
    }

    public function signup()
    {
        return view('signup');
    }
    public function account()
    {
        return view('account');
    }

    public function hello($name, $lastname=" ")
    {
        return "Hello " . $name . " " . $lastname;
    }

</pre>
Now we should use these methods in the web.php
At the top of the file add:
<pre>
use App\Http\Controllers\HomeController;
</pre>
in routes replace the anonymous functions with controller methods 
<pre>
[HomeController::class,'methodName']

Route::get('hello/{name}/{fname?}', [HomeController::class,'hello']);

Route::group(['prefix' => 'home'], function () {
    Route::get('/', [HomeController::class,'home'])->name('home');
    Route::get('/account', [HomeController::class,'account'])->name('home.account');
    Route::get('/sign-up', [HomeController::class,'signup'])->name('home.signup');
});

</pre>

Let’s add a  route and method to handle the form data 
<pre>
public function create(Request $request)
    {
        return redirect(route('home.account'));
    }

</pre>
Add the following route inside the home group 
<pre>
Route::post('/sign-up', [HomeController::class,'create'])->name('home.create');
</pre>

In signup blade change the action to this post route 
<pre>
        &lt;form action="{{ route('home.create') }}" method="post">
</pre>
Now try to submit the form: you will receive the following error **419 PAGE EXPIRED**

Why??? To protect from CSRF attack
To solve add @csrf inside the form, this adds a CSRF token to the form returned to the user and it is also stored in the server. When a user submit the form the token is submitted also and compared with the stored one in the server if both tokens are the same the form will be processed, otherwise the form will be aborted. This token is used to make sure that the one who is submitting the form is the same user who asked for the form. 
<pre>
 &lt;form action="{{ route('home.create') }}" method="post">
            @csrf
</pre>

This is a sample of how a 32 bit token looks like:
**e5c7d13d8f2cffa3097f48d3db7f3d3c9a7b84faec49fbf96e1f2e78f15d13cd**

We need to make sure that the data was entered correctly so we need to access the request data 
<pre>
 public function create(Request $request)
    {
        $username = $request->username;
        $email = $request->email;

        return redirect(route('home.account'))->with(compact('username', 'email'));
    }
</pre>
Modify the account body
<pre>
  &lt;body>
         &lt;h1 style="text-align: center">
            Congratulations you have created your account with the following information
             &lt;p>Username: {{ session('username') }}&lt;/p>
             &lt;p>Email: {{ session('email') }}&lt;/p>
       &lt;/h1>
    &lt;/body>
</pre>


## Part 6: Database  
A database is a structured collection of data stored and organized in a specific manner, allowing for efficient retrieval, modification, and management of the information it contains. The data in a database can be organized in many ways, such as tables, columns, and rows, and can be searched, sorted, and retrieved based on specific criteria.

### Data structures VS. Database 
|              | Data structures      |  Database          |
|--------------|----------------------|--------------------|
|types         | arrays, linked lists, trees, and graphs | Relational databases(MySQL, Oracle, and Microsoft SQL Server), NoSQL databases (MongoDB, Couchbase)|
|usage | organizing and storing data in a computer memory so that it can be efficiently accessed and manipulated | organizing and storing data in a computer storage so that it can be efficiently accessed and manipulated,  data indexing, query processing, and transaction management |
|
storage | computer memory (RAM) and may be temporarily stored on a hard disk or solid-state drive if the computer's memory is not sufficient to store the data structure | on the computer hard drive (HDD, SSD) or on cloud|


### Database Functionality 
A database provides several functionalities, including:

- Data storage: A database is used to store large amounts of structured data, such as text, numbers, and dates. This data can be organized into tables, with each table consisting of a set of rows and columns.

- Data retrieval: A database provides a way to quickly retrieve data from the tables. This can be done using a query language, such as SQL, that allows you to specify the data you want to retrieve and how it should be sorted and filtered.

- Data manipulation: A database allows you to add, update, and delete data in the tables. This is done using SQL commands or other methods provided by the database management system.

- Data consistency: A database provides mechanisms to ensure the consistency of the data, such as constraints, triggers, and transactions. This helps to ensure that the data in the database is accurate and consistent, even in the presence of multiple users accessing the data at the same time.

- Data security: A database provides mechanisms to control access to the data, such as authentication and authorization. This allows you to control who can access the data and what they can do with it, helping to protect sensitive data from unauthorized access.

- Data backup and recovery: A database provides mechanisms to backup the data and recover from data loss, such as backups and replication. This helps to ensure that the data is protected in the event of a hardware failure, software error, or other disaster.

### Database Basic Component 
- Tables: Tables are the basic building blocks of a database and are used to store the data. Each table consists of a set of rows and columns, with each row representing a single record and each column representing a specific field within the record.

- Fields: Fields are the individual elements within each record that store specific pieces of data, such as a customer's name, address, or phone number.

- Records: Records are the individual units of data within a table, with each record consisting of one or more fields.

- Keys: Keys are used to identify and link the records within a table and between tables. There are several types of keys, including primary keys, foreign keys, and unique keys.

- Queries: Queries are used to retrieve specific data from the database based on a set of conditions. Queries are written in a query language, such as SQL, and allow you to specify the data you want to retrieve, how it should be sorted and filtered, and how it should be displayed.

- Indexes: Indexes are used to speed up the process of retrieving data from the database by creating a separate structure that maps the data in the table to its location on disk. This allows the database management system to quickly locate the data it needs to retrieve the results of a query. 

### SQL (Structured Query Language)

Structured Query Language (SQL) is a standard programming language used for managing and manipulating relational databases. It is used to perform various operations such as creating, updating, and retrieving data stored in databases.

Here are some basic SQL commands:
- SELECT: used to retrieve data from one or more tables in a database. For example, **SELECT * FROM users** retrieves all columns and all rows from the users table.

- INSERT: used to insert data into a table. For example, **INSERT INTO users (first_name, last_name, email) VALUES ('John', 'Doe', 'johndoe@example.com')** inserts a new row into the users table with the specified values for first_name, last_name, and email.

- UPDATE: used to modify existing data in a table. For example, **UPDATE users SET email='johndoe2@example.com' WHERE id=1** updates the email address of the user with id equal to 1 in the users table.

- DELETE: used to delete data from a table. For example, **DELETE FROM users WHERE id=1** deletes the row with id equal to 1 from the users table.

- CREATE: used to create a new table, database, or other database object. For example, **CREATE TABLE users (id INT PRIMARY KEY, first_name VARCHAR(50), last_name VARCHAR(50), email VARCHAR(100))** creates a new table named users with the specified columns and data types.

- DROP: used to delete a database object, such as a table or database. For example, **DROP TABLE users** deletes the users table from the database.

## Part 7: Laravel Migrations
Laravel migrations are a feature in the Laravel web application framework that allow developers to define and manage changes to the database schema in an organized and versioned manner. With migrations, you can easily manage changes to the database schema over time, including creating new tables, modifying existing tables, and even rolling back changes.

Migrations are used to:
- Create and modify database tables: You can create new tables or modify existing tables using migrations, which makes it easy to keep track of changes to the schema over time.

- Version control for database schema: Migrations allow you to version control your database schema, just like you would with your code. You can easily roll back to a previous version of the schema if needed.

- Facilitate collaboration: Migrations make it easier for multiple developers to work on the same project without having to manually manage database changes.

- Automate database setup: Migrations can be used to automate the setup of a new database, making it easy to set up a fresh database with the correct schema in a matter of minutes.

To create a migration use the following 
command 
<pre> 
php artisan make:migration create_blogs_table
</pre>

### Migration Structure
A migration class contains two methods: **up and down**. The up method is used to add new tables, columns, or indexes to your database, while the down method should reverse the operations performed by the up method.


To run a migration use the following command, this command run the up function 
<pre> 
php artisan migrate
</pre>


To rollback the migration use this command, this command run the down function.
This command rolls back the last "batch" of migrations, which may include multiple migration files.

<pre>
php artisan migrate:rollback 

or use  the following to rollback a specific number of migrations

php artisan migrate:rollback --step=2
</pre>

The structure of creating column in migration

<pre>
$table->columnType('column_name', 'column_parameters','anotherParameters')->columnModifier();


**examples of columns with different types:
 $table->id();
 $table->foreignId('user_id');
 $table->integer('votes');
 $table->boolean('confirmed');
 $table->bigInteger('votes');
 $table->dateTime('created_at', $precision = 0);
 $table->date('created_at');
 $table->decimal('amount', $precision = 8, $scale = 2);
 $table->double('amount', 8, 2);
 $table->string('name', 100);
 $table->text('description');
 $table->longText('description');

 **examples of some modifiers:
->after('column')
->default($value)
->comment('my comment')

**the following represents constraints
->unsigned()
->unique()
->nullable($value = true)

</pre>


## Part 8: Laravel Models






