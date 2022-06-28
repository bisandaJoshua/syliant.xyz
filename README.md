# Syliant Security
A cyber security learning platform for educational institutions.

Requirements. 
1. Ensure you have a web server running on your machine such as XAMPP, LAMP or MAMP depending on the device you are using. 
2. PHP must be installed on the system. Installing the aforementioned applications should help you meet this requirement. 
3. MySQL must be installed on the system as it is the Database Management System used together with this application. 
4. A web browser is required since the application is a web-based application.
5. An internet connection is required since the application references BootStrap version 5 CSS and JavaScript files via the content delivery network.

Installation.
1. Ensure MySQL and apache are running in the background on your machine. 
navigate to: http://localhost/phpmyadmin, and enter your login credentials. (default should be username:root with no password but it is recommended to change them during installation) Copy the syliant.xyz folder to your htdocs or public_html folder. (Within C:\Xampp\htdocs if using xampp on windows for instance) 

2. Click the new button at the top left corner in the list to create a new database and name it syliant_DB. 

3. Select the syliant_DB Database and click on import. 

4. Under "file to import", click the browse button and select the syliant_DB file packaged with this application. 

5. Leave the default options and click the import button at the very bottom of the file. 

NOTE: make sure you edit the app/app_config.php file before launching the application and ensure it contains the details for your particular machine such as the database user, password, and port number for MySQL.

6. Navigate to localhost/syliant.xyz and you have a running application. 


