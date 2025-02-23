## SkillsSmart - Gamified Life Skills Training App

SkillsSmart is a web application designed to provide an engaging and gamified approach to life skills training. This application incorporates various game elements, including a points system, leveling system, and progress bars, to make the learning experience both enjoyable and effective.

## Images
**Home**

The main dashboard of SkillSmart, offering an overview of available courses, user progress, and personalized learning recommendations.
![Home](/public/main/img/home.png)


**Home (Alternative View)**

Another view of the SkillSmart homepage, highlighting featured courses and quick access to skill development resources.
![Home2](/public/main/img/home2.png)

**Skills Dashboard**

A dedicated section displaying skill categories, progress tracking, and personalized recommendations for learners.
![SkillsHome](/public/main/img/skills.png)

**Courses**

A detailed view of available courses, allowing users to browse, enroll, and track their learning journey.
![Courses](/public/main/img/courses.png)

## Features
- **Points System:** Earn points as you complete different modules and activities within the app. Track your progress and compete with others to stay motivated.
- **Leveling System:** Progress through different levels as you accumulate points. Each level represents a milestone in your life skills journey.
- **Progress Bars:** Visualize your progress with intuitive progress bars. Watch as you move closer to mastering various life skills.

## Installation

To install SkillsSmart on your computer or laptop, follow these steps:

1. **Clone Repository:**
   ```
   git clone https://github.com/nekesa-w/skillsmart_learningapp.git
   ```

2. **Database Configuration:**
   - Create a new database called `skillsmart`.
   - Import the provided SQL file (`skills_smart.sql`) into your newly created database.
   - Configure the database settings in the `app/config/database.php` file.

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

SkillsSmart is licensed under the [MIT License](LICENSE).
