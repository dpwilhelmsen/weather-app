# Weather App

Weather App is a web application that allows users to track the current weather across multiple zip codes they enter.

## Installation

To install, follow these stems

1. Download the code and deploy to a server or configure with Laravel Homestead.
2. Make a copy of the .env.example file and rename the new file to .env
3. Update the database credentials in the .env file to match you configuration
4. Add your api key for Open Weather Map to `WEATHER_API_KEY`. You can obtain a key by signing up at https://openweathermap.org/appid
5. Run composer install to install the dependencies
6. Run php artisan migrate to run the migrations on the database.
7. You're done! Navigate to the domain you set up and you should see the application and be able to register.

## Future Improvements
- Add unit testing
- Add front end testing
- Flesh out repositories for all models
- Add strong validation on form inputs

## Issues or comments
If you run into any trouble configuring or running the application, feel free to contact me or leave an issue.

