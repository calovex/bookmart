Note
-----

Please note that I couldn't get enough time to host the application on herokuapp.com since usually I don't use it for development and to save some time it's hosted on my server now (http://bookmart.mediamaxx.in/). If you'd like me to host it on on herokuapp.com please let me know, I'll configure it over there as soon as possible.

Technology Used
----------------

Linux, Apache, MySQL, PHP, JavaScript, jQuery, CSS3, OOP Concepts

Important Logins
-----------------

Paypal Sandbox Accounts

https://www.sandbox.paypal.com/in/webapps/mpp/home

Business Account
payments@bookmart.com
pass1234

Buyer Account
demobuyer@bookmart.com
pass1234

Bookmart Admin account

http://bookmart.mediamaxx.in/login
admin@bookmart.com
pass123

Developed Features
------------------
Login / Registration
Products Management
Checkout / Paypal Integration (in Sandbox mode as of now)
Order Management
Download Protection for Ebook files
Full text search
Basic CMS to manage pages such about us, privacy etc.
Category Management for top level menus
Dynamic Slideshow / Promotions management
Page views tracking
jQuery Cycle / Lightbox plugins integration
User level access validations
Manage Users (Basic features to block / unblock)

How to test
------------

Please note that the current application is a minimum viable product without much advanced features and here is how I would recommend you to test the application. First login as super admin with the above mentioned login credential and have a look around with the backend features, logout and browse the products listing, search features, CMS pages and add a couple of items to the cart, proceed with checkout. You can proceed with the guest checkout option or if you'd like to create an account before proceeding please create an account over here http://localhost/bookmart/register

To test the payment features and to download the ebook you can use the demo buyer sandbox account provided above. After the checkout and validations process you'll be redirected back to your Bookmart account and from the dashboard you can access your purchased ebook download / order details.

Browsers tested and design compatibility
----------------------------------------

Please note that it's a fixed width pure CSS static version of the template and the browser compatibility results as tested on Windows 7 are as follows.

IE 8 - works well (except for the home page slideshow since it's making use of background size cover property and no fallback solutions implemented as of now).
Latest versions of Firefox and Chrome - works well
I certainly believe this would work on other browser versions as well since almost all the css properties and markup used is well supported in recent versions of almost all the browsers.

If you have any clarifications, any issues you may find while during your testing phase or even if you'd like to have a look into the source code (available in a Bitbucket private repo) please don't hesitate to contact me at nivincp@gmail.com