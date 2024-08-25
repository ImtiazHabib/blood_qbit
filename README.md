# blood_qbit
Hello, Welcome to my github. This project is a simple blood donor list management system which i build on Raw php. For database i have use MySql. There is a forntend and backend admin panel and the database is manipuplated dynamically through CRUD operation of Php
**Project Name : Blood Donor Qbit.**

**Project Description:**

This is a blood donor information management system. Where the Admin( Client ) can add,edit,delete information of the donors in backend dashboard and it will show to frotend website with searchable options.

**Tecnology use:**

Frontend:

Html5,css3,Bootstrap 5,JQuery plugin,Javascript.

Backend:

Raw Php

Database:

MySql

**Files Included:**

1.blood\_qbit folder :  Code file ( admin,assets,inc,index )

2.blood\_qbit.sql ( it’s a database file )

3\. Documentation of the project

 **How to setup the Project:**

###  **1\. Download and Install XAMPP**

*   Download XAMPP from the official website: apachefriends.org.
*   Install XAMPP on your system by following the installation prompts.

**2\. Start Apache and MySQL**

*   Open the XAMPP Control Panel.
*   Start the **Apache** and **MySQL** services.

**3\. Set Up the Project Files**

*   Navigate to the XAMPP installation directory. By default, it’s usually:

*   **Windows**: C:\\xampp\\htdocs\\
*   **macOS**: /Applications/XAMPP/htdocs/
*   **Linux**: /opt/lampp/htdocs/

*   Inside the htdocs folder, copy here blood\_qbit attached file.

 **4. Set Up the Database (if applicable)**

If your project uses a database, follow these steps:

1.  Open your web browser and go to http://localhost/phpmyadmin/.
2.  Click on **Databases** at the top and create a new database with a name matching the one used by your project.
3.  Import your database by clicking the **Import** tab and selecting your .sql file.

**How to Use Website :**

Step 1 : Go to localhost/blood\_qbit  . here you can see the frontend of the project. On the table in the frontend you can search any donor you want .

Step 2: go to localhost/blood\_qbit/admin -à here you see a login panel . But for the time convinent I don’t make it functional. There you press login you will enter backend dashboard. The template use in backend is ADminLTE. I customize and file split this according to project requrements.

Step 3: On left side of backend dashboard you an see a donor option there you wil see manage all donor . Click on that .

Step 4: On Mange all donor page . There you can add donor , edit donor form table action button and also delete donor from delete button. It will dynamically update the frontend and backend table of all donor.

I will try to attached a video for demonstrate that.

**Code explanation:**

">

\== here , the url will go to donor.php with the information of id , so that the information could use using $\_GET .

if (isset($\_GET\['delete\_donor\_id'\])) {

\== getting donor id from url .

header("Location: donor.php");

it will  open donor.php .. for that we have to use ob\_start(), and ob\_end\_flash() on header and beoore body content.

$donor\_full\_name = mysqli\_real\_escape\_string($connect,$\_POST\['donor\_full\_name'\]);

It will protect application from sql injection.

$connect = mysqli\_connect("localhost","root","","blood\_qbit");

Database name = localhost

Username = root

Password= blank

Db name = blood\_qbit.
