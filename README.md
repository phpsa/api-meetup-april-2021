Welcome to the first of many Laravel discussions we plan on hosting. I am Craig - Originally from South Africa, but NZ based for 8 years.

Today I will be showing you how we setup our API's using the Laravel Api Controller package we developed - it started out as a simple tool, but has progressed to incorporate quite a decent functionality.
All this while staying to to the core Laravel making it compatable with almost all Laravel setups from version 6 up.

Instead of re-inventing the wheel, we use as much of the core of Laravel, this has the added advantage of being easy to implement and understand, not needing to change your coding standards / patterns to adapt to an over opinionated setup.

Currently we are on the version 2 series of this with a few updates in the pipeline.

A Quick overview of the technogogy stack:

# Laravel

A PHP framework developed with PHP developer productivity in mind. Written and maintained by Taylor Otwell, the framework is very opinionated and strives to save developer time by favouring convention over configuration.

The framework also aims to evolve with the web and has already incorporated several new features and ideas in the web development world—such as job queues, API authentication out of the box, real-time communication, and much more.

# RESTful APIs

First, we need to understand what exactly is considered a RESTful API. REST stands for **RE**presentational **S**tate **T**ransfer and is an architectural style for network communication between applications, which relies on a stateless protocol (usually HTTP) for interaction.

# HTTP Verbs Represent Actions

In RESTful APIs, we use the HTTP verbs as actions, and the endpoints are the resources acted upon. We’ll be using the HTTP verbs for their semantic meaning:

**GET**: retrieve resource(s)

**POST**: create resource

**PUT**: update resource

**DELETE**: delete resource

# First we setup Laravel

Laravel is great in that it is easy to setup, well documented and quick to install, in that Laravel sail is a quick start for docker (replacing homestead). We use Docksal (a tool that works with docker).
Head over to laravel.com and follow the install instructions that suit you.

we add a few tools to our general setup

doctrine/dbal - deals with DB column updates (SQLite testing )
laravel/fortify - general Auth logic (without view logic built in - see breeze / jetstream for alternatives)
laravel/sanctum - for SPA Auth (see postman for Oauth2)
imanghafoori/laravel-microscope
squizlabs/php_codesniffer
beyondcode/laravel-self-diagnosis
barryvdh/laravel-ide-helper
nunomaduro/phpinsights
roave/security-advisories:dev-latest

There is no shortage of these tools.

## step 2:

Setup Auth:

Ok let us setup our first api endpoints to manage Users, roles and permissions.We use Spaties Roles / Permissions package so the next steps would be installing it and publishing the configs:

From there we create a role seeder to setup our roles, and see the database.
We also create a user command to add a new user via the command line, thus not leaving any credentials in the system (there are many ways to deal with this. this is just a quick and easy option).

Hash password Trait is another such little utility we use - makes sure we set our password the correct way throughout the project.

Next we create our user controller via the command

`php artisan make:api UserController` this will generate our user controller as follows:

(quick overview of the files created)

and show in postman user get command. (console user command)

## Step 3:

Our first real api setup:

For our next bit we are going to deal with a silly blog system:

Our blog will have:

Posts

-   id
-   title
-   image
-   description
-   publish date
-   author (user)
-   category 1 only for this example
-   Tags (0 - \*)
-   delete status

So for this we need the following tables:

**categories**

-   id
-   title
-   deleted_at (laravel soft deleted)

**tags**

-   id
-   tag
-   deleted_at

**posts**
id
title
description
image
user_id
category_id
published_at
deleted_at

**post_tag**

-   post_id
-   tag_id

So at this point lets start boilerplating what we need:

1. User Already exists so lets look at the next bit:
2. Cagetgories

-   php artisan make:api CategoryController
