# Yii2 Simple App RBAC

This project gives developers a skeleton application for a Yii2 Simple application with user authentication and basic rbac. It also has the following as its default package.

  - [Yii2 Basic Application](https://github.com/yiisoft/yii2) - Base application
  - [Yii2-user](https://github.com/dektrium/yii2-user) - Authentication and user maintenance
  - [Yii2-gentelella](https://github.com/yiister/yii2-gentelella) - Admin template
  - [Yii2-audittrail](https://github.com/ximplexsoft/yii2-audittrail) - Audit Trail module
### Installation
##### Option 1 - Download zip file
1. Under the repository name, click Clone or download.
2. Extract the master.zip on your web directory. You can rename the directory to your liking.
3. Open terminal and run the following commands.
```sh
$ cd <application name>
$ composer install
$ php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
$ php yii migrate --migrationPath=@vendor/asinfotrack/yii2-audittrail/migrations
$ php yii migrate
```
4. Go to http://localhost/<application name>/web
5. Login using:
 1. Username: *admin*
 2. Password: *123456*
##### Option 2 - Clone the repository
1. Under the repository name, copy the web URL.
2. Open terminal and run the following commands.
```sh
$ git clone https://github.com/jundycosmod/yii2-basic-app-with-rbac.git
$ mv yii2-basic-app-with-rbac <application name>
$ cd <application name>
$ php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
$ php yii migrate --migrationPath=@vendor/asinfotrack/yii2-audittrail/migrations
$ php yii migrate
```
3. Follow steps 4-5 on Option 1.

### Todos

 - Visit [Issues](https://github.com/jundycosmod/yii2-basic-app-with-rbac/issues) for the pending features of this project.
### Contribute
- I haven't created a workflow yet, but you are free to report any issues related to this application.
 
