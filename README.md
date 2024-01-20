# Skills Smart - Gamified Life Skills Training Web App (CS Project I by Nicole & Terry)

Skills Smart is a web application designed to provide an engaging and gamified approach to life skills training. This application incorporates various game elements, including a points system, leveling system, and progress bars, to make the learning experience both enjoyable and effective.

## Features
- **Points System:** Earn points as you complete different modules and activities within the app. Track your progress and compete with others to stay motivated.
- **Leveling System:** Progress through different levels as you accumulate points. Each level represents a milestone in your life skills journey.
- **Progress Bars:** Visualize your progress with intuitive progress bars. Watch as you move closer to mastering various life skills.

## Installation

To install Skills Smart on your computer or laptop, follow these steps:

1. **Clone Repository:**
   ```
   git clone [repository_url]
   ```

2. **Database Configuration:**
   - Create a new database on your server.
   - Import the provided SQL file (`skills_smart.sql`) into your newly created database.
   - Configure the database settings in the `application/config/database.php` file.

3. **Web Server Configuration:**
   - Ensure that your web server (e.g., Apache, Nginx) is configured to serve the application.
   - Set the document root to the `public` directory.

4. **Environment Configuration:**
   - Set your environment variables in the `.env` file to customize the application settings.

5. **Run Migrations:**
   ```
   php spark migrate
   ```

6. **Access Skills Smart:**
   - Open your web browser and navigate to the URL where the application is hosted.

## Usage

1. **User Registration:**
   - Create a new user account to get started.
   - Provide the necessary information and follow the on-screen instructions.

2. **Explore Modules:**
   - Browse through the available life skills modules.
   - Complete activities and earn points to unlock new levels.

3. **Track Progress:**
   - Monitor your progress using the points system and progress bars.
   - Aim to reach higher levels and enhance your life skills.

4. **Compete with Others:**
   - Engage in friendly competition with other users.
   - View leaderboards to see where you stand among your peers.

## License

Skills Smart is licensed under the [MIT License](LICENSE).
