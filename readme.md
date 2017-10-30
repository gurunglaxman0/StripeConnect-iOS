# Stripe Connect iOS

Easily integrate Standard stripe account to your platform using iOS as a client and PHP as a server

<!-- ## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system. -->

### Getting Started

Copy stripe_callback.php file in your server and add your own [Stripe API keys](https://dashboard.stripe.com/account/apikeys) and [client ID](https://dashboard.stripe.com/account/applications/settings):

```

define('CLIENT_KEY', 'client_key');
define('CLIENT_SECRET', 'client_secret');
```


Install the dependencies using CocoaPods:

```
cd StripeConnect
pod install
```

Open StripeConnect.xcworkspace (not StripeConnect.xcodeproj) in Xcode. Build and run the app!
