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
