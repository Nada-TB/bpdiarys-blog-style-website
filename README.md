# bpdiarys 

Bdiarys is a blog-style website designed to document my journey towards becoming a software developer, featuring candid accounts of setbacks and imperfections aimed at inspiring beginners and individuals with unconventional paths. This project, serving as both a final and personal endeavor, allowed me to practice and refine my full-stack development skills, particularly through implementing MVC architecture.



## Table of Contents

- [Introduction](#introduction)
- [Demo](#demo)
- [sitemap](#sitemap)
- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Challenges and Learnings](#challenges-and-learnings)
- [Future Improvements](#future-improvements)
- [Contact](#contact)
- [License](#license)

## Introduction

Bdiarys is a personal blog that chronicles my transition into the world of web development through episode-style articles. The website provides free access to all visitors, offering a detailed look at my development journey. The site features user authentication for a personalized experience, allowing users to save favorite articles and manage comments. For administrators, the platform includes advanced functionalities such as article editing, comment moderation, and an internal messaging system for managing contact form submissions. This project not only showcases my technical abilities but also serves as a reflective space to share my experiences and insights.

## Demo

### Live Demo

Check out the live demo [here](https://bpdiarys.com/).

### Screenshots
screenshots are available [here](https://github.com/Nada-TB/bpdiarys-blog-style-website/tree/main/screenshoot_bpdiarys)

### sitemap
``` plain text
Home
├── Hero Section
├── Articles Section
│   ├── Article 1 (Read More -> Article Page)
│   ├── Article 2 (Read More -> Article Page)
│   └── Article 3 (Read More -> Article Page)
├── Join Us (Subscribe Button)
├── Scroll Up Button
├── Scroll Down Button
└── Footer
    ├── Subscribe Form
    └── Social Media Links

About
├── Text
└── Photo

Contact
└── Contact Form

Login
├── Login Form
├── Forgot Password Link
└── Register Button

Article Page
├── Title
├── Image
├── Save for Later (Member Only)
├── Comment Section
├── Return Home Button
├── Scroll Up Button
├── Scroll Down Button
└── Subscribe Button

Profile (Member)
├── Update Profile Form
└── Delete Account Button

Favorite Articles (Member)
├── Article Title 1 (Delete Button)
├── Article Title 2 (Delete Button)
└── Return Home Button

Tools (Admin)
├── Article Table
│   ├── Title
│   ├── Update Link
│   ├── Delete Button
│   └── Status Indicator (Validated or Not)
├── Write Article Link
└── Write Article Form
    └── Return to Tools Button

Messages (Admin)
└── Message List
    ├── Sender Name
    ├── Sender Email
    └── Message Body

Common Elements (All Pages)
├── Navigation
│   ├── Home
│   ├── About
│   ├── Contact
│   └── Login
│       └── (Logged in: Add Edit Profile, Favorite Articles, Welcome Message)
│       └── (Admin: Add Tools, Messages)
├── Scroll Up Button
├── Scroll Down Button
└── Join Us (Subscribe Button)
```

### Installation

To get Bdiarys up and running on your local machine, follow these steps:

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/Nada-TB/bpdiarys-blog-style-website
   ```

2. **Navigate to the Project Directory:**

   ```bash
   cd bdiarys
   ```

3. **Set Up a Local Server:**

   Ensure you have [WampServer](https://www.wampserver.com/en/) or [XAMPP](https://www.apachefriends.org/index.html) installed on your machine. These tools provide the PHP and MySQL environment needed to run the project.

4. **Configure the Database:**

   - Start WampServer or XAMPP and open phpMyAdmin.
   - Create a new database. For example, name it `bdiarys_db`.
   - Import the provided SQL file to set up the database schema:
     - Go to phpMyAdmin.
     - Select the `bdiarys_db` database.
     - Click on the **Import** tab.
     - Choose the SQL file provided (e.g., `bdiarys.sql`).
     - Click **Go** to import the database structure and data.

5. **Update Configuration Files:**

   - Navigate to the `models` directory in your project folder.
   - Locate the `connection_database.php` file.
   - Open the `connection_database.php` file in a text editor.
   - Update the database connection settings with your local database credentials. Example configuration:

     ```php
     <?php
     // Database configuration
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'root'); // Default username for WampServer/XAMPP
     define('DB_PASSWORD', ''); // Default password for WampServer/XAMPP (leave blank if not set)
     define('DB_DATABASE', 'bdiarys_db');
     
     // Create a connection
     $conn = new PDO(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
     
     ```

6. **Start the Server:**

   - Ensure WampServer or XAMPP is running.
   - Place the project folder (`bdiarys`) in the `www` directory of XAMPP or the `www` directory of WampServer.
   - Open your browser and navigate to `http://localhost/bdiarys` to access the project.

By following these steps, you'll have Bdiarys set up on your local server and connected to your database.

### Usage

**Homepage:**

- **Message Display:** If there are no articles in the database, the homepage will display the message: *"The budding programmer diary coming soon, stay connected!"*. When articles are available, they will be fetched and displayed on the homepage.
- **Conditional Menu Items:**
  - **Members:** See additional menu items like *Favorite Articles* and *Profile*.
  - **Admins:** See additional menu items like *Tools* for managing articles and comments.
- **Call to Action (CTA) Buttons:**
  - **Subscribe Button:** Allows users to subscribe to updates.
  - **Scroll Buttons:** Enables easy navigation through the page.
- **Article Display:**
  - **Article Snippets:** Displays previews of articles with CTA buttons such as *Read* or *Save*.
  - **Save Button:** If clicked by a member, it saves the article to their favorites and redirects them to the *Favorite Articles* page.
  - **Read Button:** Takes users to the full article page.

**Article Page:**

- **Comments:**
  - **Comment Section:** Enabled for members to add comments.
  - **Comment Management:** Members can delete their comments if needed. Admins can also moderate comments.
- **Popup Invitation:** If not logged in, a popup invites users to sign up or log in.

**Favorite Articles Page:**

- **Manage Favorites:** Lists saved articles with options to delete them.

**User Registration and Login:**

- **Registration Form:** Allows new users to register with error handling for invalid inputs.
- **Login Form:** Users can log in with their credentials.
- **Forgot Password:** Provides a mechanism to reset forgotten passwords.

**Profile Page:**

- **Update Information:** Allows members to update their profile information.
- **Delete Account:** Provides an option to delete the account.

**Admin Features:**

- **Tools Page:**
  - **Edit/Create Articles:** Admins can create new articles or update existing ones with text and images.
  - **Comment Moderation:** Manage and moderate user comments.
- **Internal Messaging:** Admins can view and manage messages sent via the contact form.
- **Secure Contact Page:** Includes CAPTCHA and CSRF protection to ensure secure form submissions.

**Bio Page:**

- **Personal Information:** Displays information about the blog or author.

**Common Features:**

- **Welcome Message:** Displayed to logged-in users across all pages.

Great! Let's incorporate the **Features** and **Technologies Used** sections into your README. Here’s how they can be presented:

### Features

1. **Responsive Design:**
   - User interface adapts seamlessly to mobile, tablet, and desktop screens, ensuring a consistent visual identity and branding across all devices.

2. **Content Management:**
   - Ability to write and publish episode-style articles.
   - Utilizes a personal markup system for text formatting, allowing for rich content presentation.

3. **User Interaction:**
   - Enables users to comment on articles and manage their favorite articles.
   - Admin features include article editing and comment moderation, providing a dynamic content management experience.

4. **Internal Messaging:**
   - Admin panel displays messages sent through the contact form, allowing for efficient communication management.

5. **Authentication and Authorization:**
   - Secure user login and role-based access control ensure appropriate access levels for different user roles.
   - Conditional page displays based on user roles enhance user experience and functionality.

6. **Security Enhancements:**
   - HTTPS redirection is implemented via `.htaccess` to ensure secure communication.
   - Captcha integration protects against spam and unauthorized access.

7. **Routing and MVC Architecture:**
   - A custom router handles URL routing, enhancing user navigation.
   - The MVC (Model-View-Controller) pattern is applied for an organized and maintainable code structure.

8. **Database Management:**
   - Designed the database schema and managed SQL queries using PHPMyAdmin.
   - Efficiently handles database operations for scalability and performance.

### Technologies Used

1. **HTML/CSS** - Markup and styling for the frontend.
2. **JavaScript (ES6, AJAX)** - Enhances interactivity and provides asynchronous data handling.
3. **PHP** - Server-side scripting language for backend logic.
4. **MySQL** - Database management system used for storing and managing data.
5. **MVC Architecture** - Design pattern used for organizing code.
6. **Responsive Design** - Ensures the website is accessible and functional across all devices.
7. **Web Deployment** - Techniques and tools for deploying the website to a live server.
8. **HTTPS Redirection** - Ensures secure connections for users.
9. **Captcha Integration** - Protects forms from spam and abuse.
10. **User Authentication and Authorization** - Manages user access and roles.
11. **Database Management** - Handles the design and operations of the database.
12. **Router Implementation** - Manages URL routing for user navigation.


## Project Structure

```plaintext
bdiarys/
├── index.php                   # Entry point and router for handling requests
├── views/                      # Contains all view templates
│   ├── layout.phtml            # Main layout template with common structure
│   ├── contact.phtml           # Contact page template
│   ├── deleteSubscriber.phtml  # Page for unsubscribing users
│   ├── editArticle.phtml       # Page for editing articles
│   ├── errorPage.phtml         # Error page template
│   ├── favoriteArticle.phtml   # Favorite articles page template
│   ├── homePage.phtml          # Homepage template
│   ├── message.phtml           # Messages page template
│   ├── profile.phtml           # User profile page template
│   ├── resetPassword.phtml     # Password reset page template
│   ├── showArticle.phtml       # Page for displaying a single article
│   ├── signUp.phtml            # User registration page template
│   ├── subscribe.phtml         # Subscription page template
│   ├── tools.phtml             # Admin tools page template
│   ├── verification.phtml      # delete account verification page template
│   ├── whoIma.phtml            # About or personal bio page template
│   └── writeArticle.phtml      # Page for writing new articles
├── SQL/                        # Contains SQL database file
│   └── bdiarys-bd.sql          # SQL file for database schema and data
├── CSS/                        # Contains stylesheets and images
│   ├── images/                 # Folder for image assets
│   ├── normalize.css           # CSS reset file
│   └── style.css               # Main stylesheet
├── js/                         # Contains JavaScript files
│   └── main.js                 # Main JavaScript file for functionality
├── models/                     # Contains model files for database interactions
│   ├── connection-dataBase.php # Database connection configuration
│   ├── messagesNumber.php      # Model for message numbers
│   ├── modelAddComment.php     # Model for adding comments
│   ├── modelContactMe.php      # Model for contact form handling
│   ├── modelDeleteAccount.php  # Model for account deletion
│   ├── modelDeleteArticle.php  # Model for article deletion
│   ├── modelDeleteComment.php  # Model for deleting comments
│   ├── modelDeleteFavorite.php # Model for removing favorite articles
│   ├── modelDeleteMessage.php  # Model for deleting messages
│   ├── modelEditArticle.php    # Model for editing articles
│   ├── modelFavoriteArticles.php # Model for managing favorite articles
│   ├── modelHomePage.php       # Model for homepage data
│   ├── modelMessages.php       # Model for handling messages
│   ├── modelProfile.php        # Model for user profiles
│   ├── modelResetPassword.php  # Model for password reset functionality
│   ├── modelAddFavorite.php    # Model for adding favorite articles
│   ├── modelSignIn.php         # Model for user sign-in
│   ├── modelShowArticle.php    # Model for displaying articles
│   ├── modelSignUp.php         # Model for user registration
│   ├── modelSubscribe.php      # Model for handling subscriptions
│   ├── modelWriteArticles.php  # Model for writing articles
│   ├── modelTools.php          # Model for admin tools
│   ├── utilities.php           # Utility functions
│   └── sessionStatus.php       # Manages user session status
├── controllers/                # Contains controller files for request handling
│   ├── addComment.php          # Controller for adding comments
│   ├── addFavorite.php         # Controller for adding favorite articles
│   ├── contactMe.php           # Controller for handling contact form
│   ├── deleteAccount.php       # Controller for account deletion
│   ├── deleteArticle.php       # Controller for deleting articles
│   ├── deleteComment.php       # Controller for deleting comments
│   ├── deleteMessage.php       # Controller for deleting messages
│   ├── deleteFavorite.php      # Controller for removing favorite articles
│   ├── deleteSubscriber.php    # Controller for unsubscribing users
│   ├── editArticle.php         # Controller for editing articles
│   ├── favoriteArticle.php     # Controller for managing favorite articles
│   ├── forgottenPassword.php    # Controller for password recovery
│   ├── homePage.php            # Controller for the homepage
│   ├── login.php               # Controller for user login
│   ├── messages.php            # Controller for messages page
│   ├── profile.php             # Controller for user profiles
│   ├── resetPassword.php       # Controller for password reset
│   ├── showArticle.php         # Controller for displaying articles
│   ├── signIn.php              # Controller for user sign-in
│   ├── signOut.php             # Controller for user sign-out
│   ├── signUp.php              # Controller for user registration
│   ├── subscribe.php           # Controller for handling subscriptions
│   ├── tools.php               # Controller for admin tools
│   ├── verify.php              # Controller for email verification
│   └── whoIam.php              # Controller for the about page
│   └── writeArticle.php        # Controller for writing articles
├── README.md                   # Project documentation
└── .htaccess                   # File for URL rewriting and security rules

```
### Challenges and Learnings

- **Challenge:** Implementing MVC Architecture  
  **Action:** Rewrote the project using the MVC pattern to organize code and separate concerns.  
  **Result:** Enhanced code maintainability and scalability, promoting better project structure and easier updates.

- **Challenge:** HTTPS Redirection  
  **Action:** Implemented URL redirection to HTTPS using `.htaccess` to ensure encrypted data transmission.  
  **Result:** Enhanced security by protecting user data during transmission.
- **Challenge:**: Content Management

 **Action:**: Authored and published episode-style articles using a personal markup system for text formatting.
 **Result:**: Successfully created and managed dynamic content, providing a structured way to present articles and engage readers.

- **Challenge:** User Authorization Management  
  **Action:** Managed default member authorization and admin roles directly in the database using PHPMyAdmin.  
  **Result:** Ensured proper access control and secure handling of user permissions.

- **Challenge:** Router Implementation  
  **Action:** Developed a custom router to handle URL routing and direct requests to appropriate controllers and actions.  
  **Result:** Improved navigation and request handling within the application.

- **Challenge:** Captcha Integration  
  **Action:** Integrated Captcha to protect the website from spam bots.  
  **Result:** Enhanced security and reduced spam, maintaining the integrity of user interactions.

- **Challenge:** Conditional Page Display  
  **Action:** Implemented conditions to display pages based on user authorization.  
  **Result:** Restricted access to certain parts of the website, ensuring secure content management.

- **Challenge:** Database Design and SQL Queries  
  **Action:** Created the database structure and tested SQL queries using PHPMyAdmin.  
  **Result:**  Efficiently managed data storage and retrieval, ensuring accurate and secure handling of user-generated content.
   - Prevented XSS attacks by securely processing and displaying user inputs.
- **Challenge:**:Frontend Development
     **Action:**:- Implemented a responsive user interface using HTML, CSS, and JavaScript.
                  - Applied a consistent color theme for the entire site.
     **Result:**: Created a user-friendly and responsive interface that provides a seamless experience across devices, attracting more visitors.
- **Performance Optimization and Deployment:**
   - Deployed the application on a web server, managing the deployment process and ensuring the application ran smoothly.
   - Optimized performance to handle user interactions efficiently and maintain a responsive user interface.

### Future Improvements

1. **Enhanced UI/UX Design:**
   - **Improvement:** Revise and modernize the user interface with updated design trends and best practices.
   - **Benefit:** Improve overall user experience, making the site more visually appealing and user-friendly across different devices.

2. **Advanced Content Management System (CMS) Features:**
   - **Improvement:** Implement additional CMS features such as content scheduling, tagging, and categorization.
   - **Benefit:** Allow more sophisticated content management and organization, enhancing the usability for admins and content creators.

3. **Full-Text Search Functionality:**
   - **Improvement:** Integrate a full-text search feature to enable users to search through articles and comments.
   - **Benefit:** Enhance content discoverability and improve user engagement by making it easier to find relevant information.

4. **Rich Text Editor for Article Writing:**
   - **Improvement:** Incorporate a rich text editor for writing and formatting articles.
   - **Benefit:** Simplify the content creation process and provide more formatting options for article authors.

5. **Multilingual Support:**
   - **Improvement:** Add support for multiple languages to cater to a broader audience.
   - **Benefit:** Expand the reach of the website to non-English-speaking users, enhancing accessibility and inclusivity.

6. **Performance Optimization:**
   - **Improvement:** Optimize website performance by implementing caching mechanisms, lazy loading, and code minification.
   - **Benefit:** Improve load times and overall site responsiveness, enhancing the user experience.

7. **Enhanced Security Features:**
   - **Improvement:** Implement additional security measures such as two-factor authentication (2FA) and advanced encryption methods.
   - **Benefit:** Strengthen security protocols to better protect user data and prevent unauthorized access.

8. **API Integration:**
   - **Improvement:** Develop and expose a RESTful API for third-party integrations and services.
   - **Benefit:** Allow external applications to interact with the site, enabling features such as content syndication and data sharing.

9. **Automated Testing and Continuous Integration:**
   - **Improvement:** Set up automated testing frameworks and continuous integration pipelines.
   - **Benefit:** Ensure code quality and reliability through regular testing and streamlined deployment processes.

10. **User Feedback and Analytics:**
    - **Improvement:** Integrate user feedback tools and analytics to gather insights on user behavior and preferences.
    - **Benefit:** Use data-driven insights to make informed decisions about future features and improvements.

11. **Enhanced Admin Panel:**
    - **Improvement:** Expand the admin panel with additional functionalities such as user management, advanced reporting, and analytics.
    - **Benefit:** Provide administrators with more comprehensive tools for managing and analyzing site content and user interactions.

12. **Mobile App Integration:**
    - **Improvement:** Develop a mobile application version of the website to complement the web experience.
    - **Benefit:** Offer a native app experience for users who prefer accessing content through mobile devices.


## Contact

- GitHub: [Nada-TB](https://github.com/Nada-TB)


## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details
