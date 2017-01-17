# Telco 
**Telco** is a package wrapper around the [AfricasTalking](http://africastalking.com/) api. 
This package has been developed for Laravel 5+.

The package makes it easy to send an **sms** from your application to a phone.

## Installation
As other laravel packages, Telco is installed via composer.

In your terminal at the project root run

```$xslt
composer require kagga/telco
```


After add the service provider to `config/app.php` in the providers section

```$xslt
'providers' => [ 
            Kagga\Telco\TelcoServiceProvider::class 
    ],
```

Then also add the Facade aliases in `config/app.php` within the alias section.

```$xslt
'aliases' => [
        'Telco' => Kagga\Telco\facades\Telco::class,
    ],
```

    
## Configuration
    
 Now we are going to config the AfricasTalking api. Head over to your account or sign up to 
    get your api key and username and jey hold of them.
   
 Publish the package config file to the `config` folder in your app by running this in your terminal.
 
 ```$xslt
php artisan vendor:publish --tag=config
```
 
 The config file called telco.php will be moved to `config/telco.php`.
 
 Then add your username and api key to the `.env` file using these keys
 
 ```$xslt
SMS_USERNAME=yourUsername
SMS_API_KEY=yourapi-key
``` 
 Thats all with the configuration.
 
 You are about to get done, just one for thing. You can test out whether its working by serving your app `php artisan serve` 
 and checking `http://localhost/telco/send` The view at this url comes bundled in the package only for testing purposes.
  
  A success message will be showed after you send the message or an error 
  message if something goes wrong.
  
## Usage
  At the moment the package has two methods, one for sending `send` an sms and the other
  the `api` that exposes the AfricasTalking Gateway.
  
  With the `api` method you can access all the public methods in the 
  [AfricasTalkingGateway](http://docs.africastalking.com/sms/sending) .
  
### Example code
  ```$xslt
Illuminate\Support\Facades\Route::post('/telco/send', function (\Kagga\Telco\contracts\TelcoInterface $telco) {

    $phonenumber = request('tel'); //Used the request laravel helper to get the phone number from a phone

    $message = request('message'); //Getting the message from the form
    
    $results = $telco->send($phonenumber, $message);
    
    if ($results != null) {

        return "Message has been sent successful to " . $phonenumber;
    }
});
```
  You can also  use the `Telco` facade that comes with the package
  to send a message.
  
  ```$xslt
Telco::send($phonenumber, $message);
```
Do not forget to add the facade import statement 
`use Kagga\Telco\facades\Telco;`

  
  _Thats it_.
  
  Thanks for using this package.
  
  Let me know what you develop with this package. By sending me an email _Johnkagga@gmail.com_ or **@johnkagga**
    