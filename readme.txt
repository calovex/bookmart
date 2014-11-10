Application URL
---------------
http://bookmart.mediamaxx.in/

Technology Used
----------------

Linux, Apache, MySQL, PHP, JavaScript, jQuery, CSS3, OOP Concepts

Important Logins
-----------------

PayPal Sandbox Accounts

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

Normal user account
nivincp@gmail.com
pass123

Developed Features
------------------
Login / Registration
Profile management
Change password / reset password (email is getting triggered from my sub domain info@bookmart.mediamaxx.in so if you don't receive the reset link please check your mailbox spam folder too.)
Products Management
Checkout / shopping cart Integration
PayPal integration (in Sandbox mode as of now) / IPN validations
Order Management
Download Protection for Ebook files
Full text search
Basic CMS to manage pages such about us, privacy etc.
Category Management for top level menus
Dynamic Slideshow / Promotions management
Page views tracking
User level access validations
Manage Users (Basic features such as block, unblock)
jQuery Cycle / Lightbox plugins integration

How to test
------------

Here is how I would recommend you to test the application. First login as super admin with the above mentioned login credential and have a look around with the backend features (all admin features can be accessed from 'manage' drop down menu in top bar), logout and browse the products listing, search features, CMS pages and add a couple of items to the cart, proceed with checkout. You can proceed with the guest checkout option or if you'd like to create an account before proceeding please create an account over here http://bookmart.mediamaxx.in/register

To test the payment features and to download the ebook you can use the demo buyer PayPal sandbox account provided above. After the checkout and IPN validations process you'll be redirected back to your Bookmart account and from the dashboard you can access your purchased ebook download / order details.

Browsers tested and design compatibility
----------------------------------------

Please note that it's a fixed width pure CSS static version of the template and the browser compatibility results as tested on Windows 7 are as follows.

IE 8 - works well (except for the home page slideshow since it's making use of background size cover property and no fallback solutions implemented as of now).
Latest versions of Firefox and Chrome - works well
I certainly believe this would work on other browser versions as well since almost all the css properties and markup used is well supported in recent versions of almost all the browsers.

If you have any clarifications or any issues you may find while during your testing phase or even if you'd like to have a look into the source code (available in a Bitbucket private repo) please don't hesitate to contact me at nivincp@gmail.com