<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Aigisbot

Welcome to the documentation for our Serverless Discord bot designed to search for game ROMs using Laravel's powerful ORM, Eloquent. This bot is a part of an ongoing effort to provide a seamless way to access game ROMs from an extensive MySQL database of games, replacing the previous method of using Google Drive folders.

**Features**
- **Serverless Architecture**: The bot is hosted on AWS Lambda, leveraging the Bref framework to ensure scalability and optimal resource allocation.

- **Discord Integration**: Discord users can effortlessly search for and retrieve game ROMs within their servers through the bot's integration.

- **Laravel Eloquent ORM**: The bot employs Laravel's powerful Eloquent ORM to interact with the MySQL database. This facilitates streamlined management of game data, ensuring fast and accurate search results.

- **Game Management Dashboard**: With the integration of Filament, a robust admin panel for Laravel, users can conveniently add, edit, and delete game entries through a user-friendly web interface.

- **GraphQL API with Lighthouse**: The system includes a GraphQL API that enables users to retrieve game entries. Powered by Lighthouse, this API simplifies the process of searching for games..

- **Comprehensive Game Database**: The MySQL database houses an extensive collection of game ROMs, providing users with access to a diverse range of games.

![Slash commands](https://i.imgur.com/gX8cPCd.png "Slash commands")

## Available slash commands

- nes
- snes
- 64
- gamecube
- wii
- switch
- genesis
- dreamcast
- psx
- ps2
- ps3
- gb
- gbc
- gba
- ds
- 3ds


## Filament Dashboard

The Serverless Discord bot introduces a robust game management dashboard, seamlessly integrated with Filament, a feature-rich admin panel tailored for Laravel applications. This dashboard empowers users to effortlessly oversee their game collections, facilitating intuitive tasks such as adding, editing, and removing game entries. Filament's capabilities enhance control and streamline the management of game libraries.

### Key Features
- **Filtering and Searching**: Users can conveniently filter games by consoles and perform name-based searches, simplifying the process of locating specific titles.

- **Sorting Functionality**: The dashboard offers a straightforward means of arranging game entries alphabetically by name.

- **Game Preview**: A well-structured dashboard interface provides users with an informative overview of their game collection.

### Dashboard Screenshots


![Games' dashboard](docs/filament/games_dashboard.png)

![Alt text](docs/filament/games_view.png)

Users can edit game entries, including additional details like region and box art.

![Alt text](docs/filament/games_edit.png)

### Usage
1. Users log into the Filament-powered dashboard using their credentials.
2. The "Games" section grants access to the user's game collection.
3. The dashboard's filtering, searching, and sorting functionalities help users quickly pinpoint specific games.
4. Users can seamlessly perform actions like adding, editing, or deleting game entries, while providing supplemental data such as region and box art.

## GraphQL API

The Discord bot introduces a GraphQL API tailored for accessing game data, creating a seamless experience for retrieving valuable information from the vast game collection. However, user authentication is a prerequisite to utilize this feature. The authentication mechanism is established using Sanctum, ensuring secure access to the API. The API endpoint for these operations is currently available at: https://roms.aigisbot.xyz/graphql.

### Queries

- **Games**: Users can retrieve a list of games by name, offering a preliminary means of exploring the extensive game catalog. (Note: Additional filters will be integrated in the future to enhance search capabilities.)

### Mutations:
- **Login**: Users can authenticate themselves via the "Login" mutation, providing necessary credentials. This process yields the user's pertinent details along with an authorization token.

- **Logout**: When necessary, users can employ the "Logout" mutation to log out of their account, effectively invalidating their current authorization token.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
