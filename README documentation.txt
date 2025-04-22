frontend changes and updates:
- the main page was completely changed and designed in a better user friendly way, that fits to be a landing page 
that attracts customers, it shows the categories, the user can fetch the products and search for whatever items he want, 
it shows include links fro about us , contact us, feedback, privacy policy and terms of service.
- we added the location and some customer feedback about us, opening hours, why to choose us , and updated the navigation for a 
desktop user friendly design, resposniveness was taken into consideration, and designed in a way that fits both desktops and 
mobiles depeneding on the screen size.
- about us was updated to include additional information about us, location, the team information, and who is behind the idea of this grocery
- the 12 category pages were updated to get the products information from the database instead of being hardcoded, the search functionality was 
implemeneted so that customers can search for any item kind even if they are not within its category
- upon clicking on the product, a model will open showing a detailed description about the product, price, and weight
- all category pages include navigation bar, where you can go to your profile, to the home page, to any other category you want, or to your cart
- added terms of service and privacy policy for additional legal compliance and protecting the rights of both the users and the service provider.
- address page was removed and included in the profile, where a user should enter the address of the deliery upon creating his account,
and can modify the address from his profile,
- made all the updates and corrected the notes that you gave us in phase 1
- the index is redirected to the landing page instead of the log in page 
- additional styling updates was made for the 12 categories pages and landing page, in addition to the user credentials pages for better design and overview.
- added promotions , as some items may have a discount , placed in the main page, data taken from the discounts table in the database,.


backend implementation:
- using wamp server, we created a database for our website , including tables for products, cart savings, user profiles and credentials,
and feedback submission 
- data was inserted to our database, and connected to our frontend so that all data and decsription, images , are now retrieved from the database 
instead of being hardcopied. 
- the search functionality and the information was all connceted to our database, by dbinc.php, and each category has its own php file made 
specifically to retreive the info from data with in that category, where products have an attribute category , 
accordinging to what category a product is specified , it appears in its page.
- reviews page was updated so that any submitted review will be saved in the database and displayed on the reviews page.
- added a file grocergo.sql that includes all our database queries, so that you can just save the code and import it
- index 
- add to cart functionality was added in the home page, in each category page, when viewing items normally, searching, or viewing the item popup 
- the items in the cart page are generated using php by retrieving the data from the database, and you can increase or decrease the quantity of items, remove an item, or clear the cart
- the checkout page order summary is also generated using php by retrieving the data from the database
- user is now able to sign up and log in smoothly
- The profile (My account) pages now retrieves all user data and displays it and the user is now able to edit some of their details.
- Forgot and change password functionalities added to the Profile and log in pages that allow the user to change their password (ForgotPassword.php and Change_pass.php were created).
- Sign out completely signs the user out of the website and the user needs to log in again to access it.