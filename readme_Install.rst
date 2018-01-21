# Project Title - URL Shorten Algorithm

Creating the short link algorithm. The main objective is to create the short link from long URLs which will basically help end user to share the URL very easily. Also we are able to see top frequently used Urls.  

## Getting Started

Firstly install Codeigniter 3.0x. Set up all basic things like base_url and database setting.

### Prerequisites

Install Codeigniter 3.0x.
Link: https://codeigniter.com/docs
```

### After installing Codeigniter follow the below process
A.	
1.	Create database - shorten_url 
2.	Create Table - urls

CREATE TABLE urls (
id int(11) NOT NULL AUTO_INCREMENT,
long_url varchar(250) DEFAULT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;

B.	Make few changes in Routes.php (application->config->routes.php)

$route['default_controller'] = "shorten";
$route['404_override'] = 'shorten/get_shorty';
$route['error_404'] = 'shorten/error_404';

C.	Create .htaccess file to hide the index.php in URL, please copy the .htaccess file.
D.	Copy input_url.php in application/views folder.
E.	Copy shorten.php in application/controllers folder.
F.	Copy Short_url_model in application/Models folders.


## Running the tests

Now the Run the application. It may not work on local system. Request you to create the instance on server.

## Deployment

While creating the instance need to change the basic setting like base_url (Config/config.php)and database setting(Config/database.php).

## Authors

* **Pragati Gaikwad** - *Initial work* 




