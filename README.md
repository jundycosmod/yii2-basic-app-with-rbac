# Yii2 Basic App RBAC

This project gives developers a skeleton application for a Yii2 basic application with user authentication and basic rbac. This will catapult developers' knowledge about Yii2 who have beginner to intermediate knowledge of the framework. It also has the following as its default package.

  - [Yii2 Basic Application](https://github.com/yiisoft/yii2) - Base application
  - [Yii2-user](https://github.com/dektrium/yii2-user) - Authentication and user maintenance
  - [Yii2-gentelella](https://github.com/yiister/yii2-gentelella) - Admin template
  - [Yii2-audittrail](https://github.com/ximplexsoft/yii2-audittrail) - Audit Trail module
### Installation
##### Option 1 - Download zip file
1. Under the repository name, click Clone or download.
2. Extract the master.zip on your web directory. You can rename the directory to your liking.
3. Create your database.
4. Open <application name>/config/db.php and change the settings accordingly.
5. Open terminal and run the following commands.
```sh
cd <application name>
composer install
php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
php yii migrate --migrationPath=@vendor/asinfotrack/yii2-audittrail/migrations
php yii migrate
```
6. Go to http://localhost/<application name>/web
7. Login using:
 * Username: *admin*
 * Password: *123456*
##### Option 2 - Clone the repository
1. Under the repository name, copy the web URL.
2. Open terminal and run the following commands.
```sh
git clone https://github.com/jundycosmod/yii2-basic-app-with-rbac.git
mv yii2-basic-app-with-rbac <application name>
```
3. Follow steps 3-7 of Option 1.

### Todos

 - Visit [Issues](https://github.com/jundycosmod/yii2-basic-app-with-rbac/issues) for the pending features of this project.
### Contribute
- I haven't created a workflow yet, but you are free to report any issues related to this application.
 
