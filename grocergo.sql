-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2025 at 10:42 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocergo`
--

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL,
  `start_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `product_id`, `discount_percent`, `start_date`, `end_date`) VALUES
(1, 1, 15.00, '2025-04-21 00:03:51', '2025-05-20 23:59:59'),
(2, 7, 15.00, '2025-04-21 00:03:51', '2025-05-20 23:59:59'),
(3, 12, 15.00, '2025-04-21 00:03:51', '2025-05-20 23:59:59'),
(4, 13, 20.00, '2025-04-21 00:03:51', '2025-05-15 23:59:59'),
(5, 16, 20.00, '2025-04-21 00:03:51', '2025-05-15 23:59:59'),
(6, 18, 20.00, '2025-04-21 00:03:51', '2025-05-15 23:59:59'),
(7, 20, 10.00, '2025-04-21 00:03:51', '2025-05-25 23:59:59'),
(8, 24, 10.00, '2025-04-21 00:03:51', '2025-05-25 23:59:59'),
(9, 26, 10.00, '2025-04-21 00:03:51', '2025-05-25 23:59:59'),
(10, 32, 25.00, '2025-04-21 00:03:51', '2025-05-10 11:00:00'),
(11, 36, 25.00, '2025-04-21 00:03:51', '2025-05-10 11:00:00'),
(12, 38, 25.00, '2025-04-21 00:03:51', '2025-05-10 11:00:00'),
(13, 42, 15.00, '2025-04-21 00:03:51', '2025-06-01 23:59:59'),
(14, 50, 10.00, '2025-04-21 00:03:51', '2025-06-01 23:59:59'),
(15, 64, 20.00, '2025-04-21 00:03:51', '2025-06-01 23:59:59'),
(16, 69, 15.00, '2025-04-21 00:03:51', '2025-06-01 23:59:59'),
(17, 92, 30.00, '2025-04-21 00:03:51', '2025-08-31 23:59:59'),
(18, 101, 20.00, '2025-04-21 00:03:51', '2025-08-31 23:59:59'),
(19, 118, 15.00, '2025-04-21 00:03:51', '2025-08-31 23:59:59'),
(20, 129, 25.00, '2025-04-21 00:03:51', '2025-05-07 23:59:59'),
(21, 134, 15.00, '2025-04-21 00:03:51', '2025-05-07 23:59:59'),
(22, 137, 10.00, '2025-04-21 00:03:51', '2025-05-07 23:59:59'),
(23, 146, 20.00, '2025-04-21 00:03:51', '2025-05-11 23:59:59'),
(24, 166, 15.00, '2025-04-21 00:03:51', '2025-05-11 23:59:59'),
(25, 176, 10.00, '2025-04-21 00:03:51', '2025-05-11 23:59:59'),
(26, 185, 15.00, '2025-04-21 00:03:51', '2025-05-31 23:59:59'),
(27, 190, 10.00, '2025-04-21 00:03:51', '2025-05-31 23:59:59'),
(28, 192, 20.00, '2025-04-21 00:03:51', '2025-05-31 23:59:59'),
(29, 202, 25.00, '2025-04-21 00:03:51', '2025-05-12 23:59:59'),
(30, 220, 15.00, '2025-04-21 00:03:51', '2025-05-12 23:59:59'),
(31, 223, 10.00, '2025-04-21 00:03:51', '2025-05-12 23:59:59'),
(32, 224, 30.00, '2025-04-21 00:03:51', '2025-05-15 23:59:59'),
(33, 231, 20.00, '2025-04-21 00:03:51', '2025-05-15 23:59:59'),
(34, 235, 15.00, '2025-04-21 00:03:51', '2025-05-15 23:59:59'),
(35, 239, 10.00, '2025-04-21 00:03:51', '2025-05-20 23:59:59'),
(36, 243, 15.00, '2025-04-21 00:03:51', '2025-05-20 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` varchar(20) NOT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `amount`, `image_path`, `category`) VALUES
(1, 'Tomatoes', 'Fresh, juicy tomatoes perfect for salads, sauces, and sandwiches. Grown locally with no artificial preservatives.', '$0.60', '500g', '../images/fruits/tomatoes.jpeg', 'fruitsandvegetables'),
(2, 'Cucumber', 'Crisp and refreshing cucumbers, ideal for salads or healthy snacks. Hydrating and packed with nutrients.', '$0.50', '500g', '../images/fruits/cucumber.jpg', 'fruitsandvegetables'),
(3, 'Lettuce', 'Fresh green lettuce with crisp leaves, perfect for salads and sandwiches. Organically grown.', '$0.85', '1 piece', '../images/fruits/lettuce.jpg', 'fruitsandvegetables'),
(4, 'Potatoes', 'Versatile potatoes great for boiling, baking, or frying. Locally sourced and freshly harvested.', '$0.38', '500g', '../images/fruits/potatoes.jpg', 'fruitsandvegetables'),
(5, 'Broccoli', 'Nutrient-rich broccoli florets, perfect for steaming, stir-fries or as a healthy side dish.', '$1.20', '500g', '../images/fruits/brocoli.jpg', 'fruitsandvegetables'),
(6, 'Carrots', 'Sweet and crunchy carrots, packed with beta-carotene. Great for snacking or cooking.', '$0.75', '500g', '../images/fruits/carrots.jpg', 'fruitsandvegetables'),
(7, 'Avocado', 'Creamy, nutrient-dense avocados. Perfect for guacamole, toast, or salads.', '$1.60', '500g', '../images/fruits/avocado.jpg', 'fruitsandvegetables'),
(8, 'Apples', 'Crisp and sweet apples, great for snacking or baking. Rich in fiber and antioxidants.', '$0.80', '500g', '../images/fruits/apples.jpg', 'fruitsandvegetables'),
(9, 'Bananas', 'Naturally sweet bananas, a great source of potassium and energy. Perfect for smoothies or snacks.', '$0.65', '500g', '../images/fruits/banana.jpg', 'fruitsandvegetables'),
(10, 'Oranges', 'Juicy oranges packed with vitamin C. Great for juicing or eating fresh.', '$0.64', '500g', '../images/fruits/oranges.webp', 'fruitsandvegetables'),
(11, 'Grapes', 'Sweet seedless grapes, perfect for snacking or fruit salads. Rich in antioxidants.', '$1.30', '500g', '../images/fruits/grapes.webp', 'fruitsandvegetables'),
(12, 'Strawberries', 'Sweet and juicy strawberries, perfect for desserts or eating fresh. Packed with vitamin C.', '$1.40', '500g', '../images/fruits/strawberries.webp', 'fruitsandvegetables'),
(13, 'Chicken Breast', 'Fresh, boneless chicken breast. Perfect for grilling, baking, or stir-frying. High in protein and low in fat.', '$5.99', '500g', '../images/butchery and seafood/chickenBreast.jpg', 'butcheryandSeafood'),
(14, 'Chicken Wings', 'Juicy chicken wings, great for frying, baking, or grilling. Perfect for game day or family meals.', '$4.49', '500g', '../images/butchery and seafood/chickenWings.jpg', 'butcheryandSeafood'),
(15, 'Ground Beef', 'Premium quality ground beef, ideal for burgers, meatballs, or bolognese. 80% lean, 20% fat for perfect flavor.', '$7.99', '500g', '../images/butchery and seafood/groundbeef.jpg', 'butcheryandSeafood'),
(16, 'Salmon Fillet', 'Fresh Atlantic salmon fillet, rich in omega-3 fatty acids. Perfect for grilling, baking, or pan-searing.', '$9.99', '300g', '../images/butchery and seafood/salmon.jpg', 'butcheryandSeafood'),
(17, 'Sheep Liver', 'Fresh sheep liver, packed with iron and nutrients. Ideal for traditional dishes or pan-frying with onions.', '$6.49', '500g', '../images/butchery and seafood/sheepliver.jpg', 'butcheryandSeafood'),
(18, 'Shrimps', 'Fresh, peeled shrimps ready for cooking. Great for pasta, stir-fries, or grilled skewers.', '$8.99', '400g', '../images/butchery and seafood/shrimps.jpg', 'butcheryandSeafood'),
(19, 'Beef Steak', 'Premium cut beef steak, tender and flavorful. Perfect for grilling or pan-searing to your preferred doneness.', '$12.99', '400g', '../images/butchery and seafood/steak.jpg', 'butcheryandSeafood'),
(20, 'Horizon Organic Grassfed Whole Milk', 'Organic whole milk from grass-fed cows. Rich in nutrients and packed with natural goodness.', '$6.99', '1.75L', '../images/dairy and eggs/wholeMilk.webp', 'dairyandeggs'),
(21, 'Wellsley Greek Plain Nonfat Yogurt', 'Creamy Greek yogurt with 0% fat. High in protein and perfect for healthy breakfasts or snacks.', '$5.49', '2.5lbs', '../images/dairy and eggs/greekYogurt.avif', 'dairyandeggs'),
(22, 'Philadelphia Whipped Cream Cheese', 'Light and fluffy whipped cream cheese. Spreads easily and tastes delicious on bagels or crackers.', '$4.99', '8oz', '../images/dairy and eggs/CreamCheese.webp', 'dairyandeggs'),
(23, 'Plein Soleil Shredded Cheddar', 'Premium quality shredded cheddar cheese. Perfect for melting, cooking, or snacking.', '$5.99', '400g', '../images/dairy and eggs/cheddar.jpg', 'dairyandeggs'),
(24, 'Kiri Cheese', 'Creamy and smooth cheese portions. Great for kids\' snacks or as a dessert cheese.', '$3.99', 'Pack: 5x6', '../images/dairy and eggs/kiri.avif', 'dairyandeggs'),
(25, 'Lurpak Unsalted Butter', 'Premium quality unsalted butter made from pure cream. Ideal for baking and cooking.', '$4.49', '200g', '../images/dairy and eggs/butter.jpg', 'dairyandeggs'),
(26, 'White Eggs', 'Fresh white eggs from free-range chickens. Pack of 30 large eggs.', '$6.99', 'Pack: 30 pcs', '../images/dairy and eggs/eggs30.jpg', 'dairyandeggs'),
(27, 'Brown Eggs', 'Farm-fresh brown eggs with rich yolks. Pack of 15 medium eggs.', '$3.99', 'Pack: 15 pcs', '../images/dairy and eggs/eggs15.png', 'dairyandeggs'),
(32, 'White Bread', 'Freshly baked white bread with a soft texture and golden crust. Perfect for sandwiches or toast.', '$0.85', '800g', '../images/bakery/whiteBread.jpg', 'bakery'),
(33, 'Whole Wheat Bread', 'Nutritious whole wheat bread packed with fiber and nutrients. A healthier alternative to white bread.', '$1.25', '800g', '../images/bakery/whole wheat.jpg', 'bakery'),
(34, 'White Toast', 'Pre-sliced white toast bread, perfect for breakfast or quick sandwiches. Stays fresh longer.', '$2.55', '750g', '../images/bakery/whiteToast.png', 'bakery'),
(35, 'Whole Wheat Toast', 'Healthy whole wheat toast with all the goodness of whole grains. Great for toasting.', '$2.94', '800g', '../images/bakery/wholeWheatToast.png', 'bakery'),
(36, 'Baguette', 'Traditional French baguette with crispy crust and soft interior. Perfect for sandwiches or with soups.', '$1.87', '1 piece', '../images/bakery/baguette.jpg', 'bakery'),
(37, 'Burger Buns', 'Soft and fluffy burger buns, perfect for homemade burgers. Comes in a pack of six.', '$2.83', '6 pieces', '../images/bakery/burgerbuns.avif', 'bakery'),
(38, 'Croissant', 'Buttery, flaky croissant with a golden crust. Perfect for breakfast or as a snack.', '$1.70', '1 piece', '../images/bakery/croissants.jpg', 'bakery'),
(39, 'Donut', 'Classic glazed donut with soft texture and sweet icing. A delicious treat any time of day.', '$2.38', '1 piece', '../images/bakery/donuts.webp', 'bakery'),
(40, 'Muffin', 'Moist and flavorful muffin, perfect with coffee or tea. Available in various flavors.', '$1.80', '1 piece', '../images/bakery/muffins.webp', 'bakery'),
(41, 'Red Velvet Cake', 'Decadent red velvet cake with cream cheese frosting. A perfect dessert for special occasions.', '$3.75', '1 piece', '../images/bakery/redVelvetCake.webp', 'bakery'),
(42, 'Barilla Fettuccine Pasta', 'Premium Italian pasta made with durum wheat semolina for authentic taste and perfect al dente texture.', '$2.99', '16oz', '../images/pantry essentials/barilla fettucini pasta.avif', 'pantryEssentials'),
(43, 'Almonds', 'Natural raw almonds packed with protein, fiber, and healthy fats. Great for snacking or cooking.', '$9.99', '500g', '../images/pantry essentials/almonds.webp', 'pantryEssentials'),
(44, 'Apple Cider Vinegar', 'Organic unfiltered apple cider vinegar with the mother, rich in enzymes and beneficial bacteria.', '$4.99', '500ml', '../images/pantry essentials/apple vinegar.jpg', 'pantryEssentials'),
(45, 'Barilla Farfalle Pasta', 'Bow tie shaped pasta perfect for salads and creamy sauces. Made from high-quality durum wheat.', '$2.99', '16oz', '../images/pantry essentials/barilla farfalle pasta.webp', 'pantryEssentials'),
(46, 'Barilla Rotini Pasta', 'Corkscrew shaped pasta that holds sauces well. Ideal for pasta salads and baked dishes.', '$2.99', '16oz', '../images/pantry essentials/barilla rotini pasta.webp', 'pantryEssentials'),
(47, 'Barilla Spaghetti Pasta', 'Classic Italian spaghetti made from 100% durum wheat semolina for authentic taste.', '$2.99', '500g', '../images/pantry essentials/Barilla Spaghetti.jpg', 'pantryEssentials'),
(48, 'Barilla Whole Wheat Pasta', 'Nutritious whole wheat pasta with all the goodness of whole grains and great taste.', '$3.49', '500g', '../images/pantry essentials/barilla whole wheat pasta.jpg', 'pantryEssentials'),
(49, 'Barilla Penne Pasta', 'Tube-shaped pasta with ridges that hold sauce perfectly. Great for baked pasta dishes.', '$2.99', '16oz', '../images/pantry essentials/Barillla Penne Pasta.jpg', 'pantryEssentials'),
(50, 'Basmati Rice', 'Premium long grain basmati rice with delicate aroma and fluffy texture when cooked.', '$6.99', '5lb', '../images/pantry essentials/basmatiRice.png', 'pantryEssentials'),
(51, 'BBQ Sauce', 'Rich and tangy barbecue sauce perfect for grilling, dipping, and marinating.', '$3.99', '500ml', '../images/pantry essentials/BBQ sauce.webp', 'pantryEssentials'),
(52, 'Almond Butter', 'Creamy almond butter made from 100% roasted almonds with no added sugar or oils.', '$8.99', '250g', '../images/pantry essentials/almond butter.jpeg', 'pantryEssentials'),
(53, 'Black Pepper Powder', 'Freshly ground black pepper with robust flavor and aroma. Essential kitchen seasoning.', '$3.49', '50g', '../images/pantry essentials/black pepper powder.png', 'pantryEssentials'),
(54, 'Brown Sugar', 'Natural brown sugar with rich molasses flavor. Perfect for baking and sweetening.', '$2.99', '1kg', '../images/pantry essentials/brown sugar.avif', 'pantryEssentials'),
(55, 'Cashews', 'Premium quality whole cashews, rich and buttery. Great for snacking or cooking.', '$9.99', '500g', '../images/pantry essentials/cashews.jpg', 'pantryEssentials'),
(56, 'Chickpeas', 'Ready-to-use chickpeas in water. Perfect for hummus, salads, and stews.', '$1.99', '16oz can', '../images/pantry essentials/chickPeas.webp', 'pantryEssentials'),
(57, 'Chilli Pepper Powder', 'Spicy red chili powder to add heat and flavor to your dishes.', '$3.29', '60g', '../images/pantry essentials/chilli pepper powder.webp', 'pantryEssentials'),
(58, 'Coconut Oil', 'Pure virgin coconut oil, unrefined and cold-pressed. Great for cooking and skincare.', '$6.99', '600g', '../images/pantry essentials/coconut oil.webp', 'pantryEssentials'),
(59, 'Cumin Powder', 'Aromatic ground cumin with earthy flavor. Essential for curries and Mexican dishes.', '$3.49', '50g', '../images/pantry essentials/cumin powder.avif', 'pantryEssentials'),
(60, 'Dolly\'s Ketchup', 'Classic tomato ketchup with perfect balance of sweetness and tanginess.', '$1.99', '450g', '../images/pantry essentials/dollys ketchup 450g.avif', 'pantryEssentials'),
(61, 'Garlic Powder', 'Dehydrated garlic ground into fine powder. Convenient alternative to fresh garlic.', '$3.29', '85.05g', '../images/pantry essentials/garlic powder.jpeg', 'pantryEssentials'),
(62, 'Green Lentils', 'Nutritious green lentils that hold their shape well when cooked. High in protein.', '$4.99', '1kg', '../images/pantry essentials/green lentils.webp', 'pantryEssentials'),
(63, 'Black Beans', 'Ready-to-use black beans in water. Great for Mexican dishes, soups and salads.', '$1.50', '15 oz can', '../images/pantry essentials/black beans.jpeg', 'pantryEssentials'),
(64, 'Natural Honey', 'Pure, raw honey with all its natural enzymes and health benefits.', '$12.40', '1 kg', '../images/pantry essentials/honey.jpg', 'pantryEssentials'),
(65, 'Mayonnaise', 'Creamy, rich mayonnaise perfect for sandwiches, salads and dips.', '$4.99', '675ml', '../images/pantry essentials/mayonnaise.png', 'pantryEssentials'),
(66, 'Olive Oil', 'Extra virgin olive oil, cold extracted for maximum flavor and health benefits.', '$14.99', '3L', '../images/pantry essentials/olive oil.webp', 'pantryEssentials'),
(67, 'Onion Powder', 'Dehydrated onions ground into fine powder. Adds onion flavor without the texture.', '$3.49', '289.3g', '../images/pantry essentials/onion powder.png', 'pantryEssentials'),
(68, 'Paprika Powder', 'Mild, sweet paprika powder that adds color and subtle flavor to dishes.', '$3.99', '60g', '../images/pantry essentials/paprika powder.webp', 'pantryEssentials'),
(69, 'Peanut Butter', 'Smooth peanut butter made from 100% roasted peanuts with no added sugar.', '$5.49', '340g', '../images/pantry essentials/peanut butter.webp', 'pantryEssentials'),
(70, 'Peanuts', 'Raw peanuts in shell. Great for snacking or making homemade peanut butter.', '$4.99', '500g', '../images/pantry essentials/peanuts.jpeg', 'pantryEssentials'),
(71, 'Red Lentils', 'Quick-cooking red lentils that break down easily, perfect for soups and dals.', '$3.99', '1kg', '../images/pantry essentials/red lentils.webp', 'pantryEssentials'),
(72, 'Rolled Oats', 'Whole grain rolled oats, perfect for porridge, baking and smoothies.', '$4.49', '500g', '../images/pantry essentials/rolled oats.jpg', 'pantryEssentials'),
(73, 'Salt', 'Fine iodized table salt for cooking and seasoning.', '$1.99', '1kg', '../images/pantry essentials/salt.avif', 'pantryEssentials'),
(74, 'Sea Sardines', 'Sardines in olive oil, rich in omega-3 fatty acids and protein.', '$2.99', '106g', '../images/pantry essentials/Sea Sardines.jpg', 'pantryEssentials'),
(75, 'Tahini', 'Sesame seed paste, a key ingredient in hummus and Middle Eastern cuisine.', '$7.49', '400g', '../images/pantry essentials/tahini.avif', 'pantryEssentials'),
(76, 'Tuna in Water', 'Premium tuna packed in water. High protein, low fat option for salads and sandwiches.', '$2.89', '160g', '../images/pantry essentials/tuna in water.avif', 'pantryEssentials'),
(77, 'Tuna in Sunflower Oil', 'Tuna packed in sunflower oil for extra flavor and moisture.', '$2.99', '160g', '../images/pantry essentials/tuna in sunflower oil.jpg', 'pantryEssentials'),
(78, 'Sunflower Oil', 'Pure sunflower oil, light flavor and high smoke point ideal for frying.', '$9.99', '3L', '../images/pantry essentials/vegetable oil.webp', 'pantryEssentials'),
(79, 'White Flour', 'All-purpose white flour for baking bread, cakes and pastries.', '$3.99', '5lb', '../images/pantry essentials/white flour.webp', 'pantryEssentials'),
(80, 'Soy Sauce', 'Traditional brewed soy sauce with rich umami flavor for Asian cooking.', '$2.49', '150ml', '../images/pantry essentials/soy sauce.webp', 'pantryEssentials'),
(81, 'Sunflower Seeds', 'Raw sunflower seeds packed with healthy fats and vitamin E.', '$3.49', '500g', '../images/pantry essentials/sunflower seeds.jpeg', 'pantryEssentials'),
(82, 'Turmeric Powder', 'Bright yellow turmeric powder with anti-inflammatory properties.', '$4.29', '67g', '../images/pantry essentials/turmeric powder.webp', 'pantryEssentials'),
(83, 'Walnuts', 'Whole walnut halves rich in omega-3 fatty acids. Great for baking and snacking.', '$8.99', '400g', '../images/pantry essentials/walnuts.jpg', 'pantryEssentials'),
(84, 'White Sugar', 'Granulated white sugar for baking, sweetening beverages and cooking.', '$5.99', '50lb', '../images/pantry essentials/white sugar.jpg', 'pantryEssentials'),
(85, 'White Vinegar', 'Clear distilled vinegar for cooking, cleaning and pickling.', '$3.79', '500ml', '../images/pantry essentials/white vinegar.avif', 'pantryEssentials'),
(86, 'White Rice', 'Long grain white rice that cooks up fluffy and separate.', '$5.99', '1kg', '../images/pantry essentials/whiteRice.webp', 'pantryEssentials'),
(87, 'Whole Grain Brown Rice', 'Nutritious whole grain brown rice with all the bran and germ intact.', '$6.49', '1lb (454g)', '../images/pantry essentials/whole grain rice.png', 'pantryEssentials'),
(88, 'Whole Peeled Plum Tomatoes', 'Italian-style peeled plum tomatoes in juice. Perfect for sauces and stews.', '$2.99', '14.5oz (411g)', '../images/pantry essentials/whole peeled plum tomatoes.webp', 'pantryEssentials'),
(89, 'Whole Wheat Flour', '100% whole wheat flour with all the natural bran and germ.', '$4.99', '5lbs (2.27kg)', '../images/pantry essentials/whole wheat flour.jpg', 'pantryEssentials'),
(90, 'Worcestershire Sauce', 'Classic Worcestershire sauce with complex savory flavor for meats and marinades.', '$4.99', '150ml', '../images/pantry essentials/Worcestershire Sauce.avif', 'pantryEssentials'),
(91, 'Yellow Mustard', 'Bright yellow prepared mustard with tangy flavor for sandwiches and hot dogs.', '$3.79', '226g', '../images/pantry essentials/yellow mustard.avif', 'pantryEssentials'),
(92, 'Evian Water Bottle', 'Natural spring water from the French Alps. Pure and refreshing.', '$1.99', '500ml', '../images/beverages/evian water bottle 500ml.png', 'beverages'),
(93, 'Sparkling Water', 'Carbonated mineral water with a crisp, refreshing taste.', '$1.99', '500ml', '../images/beverages/sparkling water.avif', 'beverages'),
(94, 'Rim Mineral Water', 'Natural mineral water pack. Great for home or office use.', '$5.99', '2L x 6 Bottles', '../images/beverages/rim  mineral water 2Lx6.avif', 'beverages'),
(95, 'Nestle Pure Life Gallon Water', 'Purified drinking water in a convenient gallon size.', '$2.99', '5L', '../images/beverages/nestle pure life Gallon water.jpg', 'beverages'),
(96, '7UP', 'Clear, crisp lemon-lime flavored soda. Refreshing and caffeine-free.', '$1.29', '330ml', '../images/beverages/7UP.webp', 'beverages'),
(97, 'Almond Milk', 'Creamy dairy-free milk alternative made from almonds.', '$3.99', '1L', '../images/beverages/almond milk 1L.jpg', 'beverages'),
(98, 'Black Tea 100 Pack', 'Premium black tea bags for a classic tea experience.', '$4.99', '100 Tea Bags', '../images/beverages/black tea 100 pack.jpg', 'beverages'),
(99, 'Black Tea', 'Rich and robust black tea in convenient tea bags.', '$2.49', '50 Tea Bags', '../images/beverages/black tea.avif', 'beverages'),
(100, 'Classic Plain Najjar Coffee', 'Premium Lebanese coffee with a rich, authentic flavor.', '$5.99', '200g', '../images/beverages/classic plain najjar coffee.jpg', 'beverages'),
(101, 'Coca-Cola', 'The classic Coca-Cola taste in a convenient bottle.', '$1.29', '330ml', '../images/beverages/cocacola.png', 'beverages'),
(102, 'Coconut Milk', 'Rich and creamy dairy-free milk alternative made from coconuts.', '$4.49', '1L', '../images/beverages/coconut milk 1L.jpg', 'beverages'),
(103, 'Coffee Creamer', 'Non-dairy creamer for coffee. Adds rich, creamy texture.', '$3.99', '400g', '../images/beverages/coffee creamer.jpg', 'beverages'),
(104, 'Dark Blue Energy Drink', 'Energy drink with taurine, caffeine and B-vitamins for a quick boost.', '$2.49', '250ml', '../images/beverages/dark blue.avif', 'beverages'),
(105, 'Dark Cafe Original Coffee', 'Ready-to-drink premium coffee with a rich, dark roast flavor.', '$3.99', '200ml', '../images/beverages/dark cafe original coffee 200ml.avif', 'beverages'),
(106, 'Green Tea', 'Antioxidant-rich green tea with a light, refreshing taste.', '$4.29', '20 Tea Bags', '../images/beverages/green tea.jpg', 'beverages'),
(107, 'Ground Coffee', 'Premium ground coffee beans for a rich, aromatic brew.', '$6.49', '250g', '../images/beverages/ground coffee.jpg', 'beverages'),
(108, 'Ice Tea Peach Diet', 'Refreshing peach-flavored iced tea with no added sugar.', '$1.99', '500ml', '../images/beverages/ice tea peach diet.jpg', 'beverages'),
(109, 'Luna Iced Coffee Mocha', 'Ready-to-drink iced coffee with rich mocha flavor.', '$3.99', '250ml', '../images/beverages/luna iced coffee mocha.webp', 'beverages'),
(110, 'Lipton Chamomile Tea Herbal', 'Soothing herbal tea with natural chamomile flowers.', '$3.99', '20 Tea Bags', '../images/beverages/lipton chamomile tea herbal 20 packs.avif', 'beverages'),
(111, 'Mirinda', 'Sparkling orange-flavored soft drink.', '$1.29', '330ml', '../images/beverages/mirinda.webp', 'beverages'),
(112, 'Najjar Classic Coffee with Cardamom', 'Traditional Lebanese coffee with aromatic cardamom.', '$6.49', '200g', '../images/beverages/najjar classic with Cardamom.jpg', 'beverages'),
(113, 'Najjar Decaf Coffee', 'Premium Lebanese coffee without the caffeine.', '$5.99', '200g', '../images/beverages/najjar decaf coffee.jpg', 'beverages'),
(114, 'Nescafe 3 in 1 Classic Instant Coffee', 'Instant coffee with creamer and sugar in convenient sachets.', '$8.99', '20g x 24 packs', '../images/beverages/Nescafe 3 in 1 classic instant coffee 20gx24 packs.jpg', 'beverages'),
(115, 'Nescafe Dark Roast Instant Coffee', 'Rich, dark roast instant coffee with intense flavor.', '$7.99', '100g', '../images/beverages/nescafe dark roast instant coffee.jpg', 'beverages'),
(116, 'Oat Milk', 'Creamy dairy-free milk alternative made from oats.', '$4.29', '1L', '../images/beverages/oat milk 1L.jpg', 'beverages'),
(117, 'Pepsi', 'The classic Pepsi cola taste in a convenient bottle.', '$1.29', '330ml', '../images/beverages/pepsi.png', 'beverages'),
(118, 'Red Bull', 'Energy drink that vitalizes body and mind.', '$2.99', '250ml', '../images/beverages/red bull.jpg', 'beverages'),
(119, 'Soy Milk', 'Nutritious dairy-free milk alternative made from soybeans.', '$4.29', '1L', '../images/beverages/soy milk 1L.avif', 'beverages'),
(120, 'Torabika Cappuccino Instant Coffee', 'Instant cappuccino mix with rich coffee flavor.', '$7.99', '22 Packs', '../images/beverages/torabika cappuccino instant coffee 22 packs.webp', 'beverages'),
(121, 'Torabika Sugar-Free Cappuccino', 'Instant cappuccino mix without added sugar.', '$6.99', '20 Packs', '../images/beverages/torabika sugar free cappuccino coffee 12.5gx20 packs.avif', 'beverages'),
(122, 'UNO Chocolate Shake', 'Rich and creamy chocolate-flavored milk drink.', '$2.99', '250ml', '../images/beverages/UNO chocolate shake.webp', 'beverages'),
(123, 'UNO Apple Juice', '100% pure apple juice with no added sugar.', '$1.99', '250ml', '../images/beverages/UNO apple juice.jpg', 'beverages'),
(124, 'UNO Mango Juice', 'Sweet and tropical mango-flavored juice drink.', '$1.99', '250ml', '../images/beverages/UNO mango juice.webp', 'beverages'),
(125, 'UNO Orange Juice', '100% pure orange juice with no added sugar.', '$1.99', '250ml', '../images/beverages/UNO orange juice.jpg', 'beverages'),
(126, 'UNO Pineapple Juice', 'Sweet and tangy pineapple-flavored juice drink.', '$1.99', '250ml', '../images/beverages/UNO pineapple.jpg', 'beverages'),
(127, 'UNO Strawberry & Banana Juice', 'Delicious blend of strawberry and banana flavors.', '$1.99', '250ml', '../images/beverages/UNO strawberry and banana juice.jpg', 'beverages'),
(128, 'UNO Strawberry Milkshake', 'Creamy strawberry-flavored milk drink.', '$2.99', '250ml', '../images/beverages/UNO strawberry milkshake.avif', 'beverages'),
(129, 'Byte Frozen Cheese Sambousek', 'Delicious cheese-filled sambousek, perfect for quick snacks or appetizers. Ready to cook from frozen.', '$5.99', '400g', '../images/frozen food/byte frzoen cheese sambousek.jpg', 'frozenfood'),
(130, 'Frozen Beef Kibbeh', 'Traditional beef kibbeh with authentic spices. Just fry or bake for a delicious meal.', '$6.99', '400g', '../images/frozen food/frozen beef kibbeh 400g.webp', 'frozenfood'),
(131, 'Frozen Chopped Spinach', 'Convenient chopped spinach, perfect for pies, stews, or side dishes. No need to wash or chop.', '$3.49', '400g', '../images/frozen food/frozen chopped spinach.png', 'frozenfood'),
(132, 'Frozen Cooked Chicken Nuggets', 'Pre-cooked chicken nuggets, ready to heat and serve. Great for quick meals or snacks.', '$7.99', '500g', '../images/frozen food/frozen cooked chicken nuggets.jpg', 'frozenfood'),
(133, 'Frozen Minced Beef', 'High-quality minced beef, perfect for burgers, meatballs, or bolognese. Individually frozen for convenience.', '$8.99', '500g', '../images/frozen food/frozen minced beef.jpg', 'frozenfood'),
(134, 'Plein Soleil Frozen Blueberries', 'Sweet frozen blueberries, great for smoothies, baking, or as a healthy snack. Packed with antioxidants.', '$4.99', '400g', '../images/frozen food/plein soleil frozen blueberries 400g.avif', 'frozenfood'),
(135, 'Maxim\'s Frozen Pizza Margherita', 'Classic margherita pizza with tomato sauce and mozzarella. Ready to bake in minutes.', '$6.49', '400g', '../images/frozen food/Maxim\'S frozen pizza margherita.jpg', 'frozenfood'),
(136, 'MyProtein Chocolate Ice Cream', 'High-protein chocolate ice cream, a delicious and healthier frozen treat.', '$5.99', '500ml', '../images/frozen food/Myprotein chocolate ice crea,.jpg', 'frozenfood'),
(137, 'Vanilla Family Pack Ice Cream', 'Creamy vanilla ice cream in a family-sized pack. Perfect for desserts and treats.', '$7.99', '1L', '../images/frozen food/vanilla family pack ice cream.jpg', 'frozenfood'),
(138, 'Plein Soleil Frozen Broccoli', 'Nutritious frozen broccoli florets, ready to steam or stir-fry. Preserves all the vitamins and minerals.', '$3.99', '400g', '../images/frozen food/frozen plein soleil brocoli 400g.avif', 'frozenfood'),
(139, 'McCain Frozen Potato Wedges', 'Crispy potato wedges, perfect for baking or air frying. Great side dish or snack.', '$4.99', '750g', '../images/frozen food/McCain frozen potato wedges.jpeg', 'frozenfood'),
(140, 'Plein Soleil Frozen Edamame', 'Whole green soybeans, rich in protein and fiber. Steam or boil for a healthy snack.', '$5.49', '400g', '../images/frozen food/plein soleil frozen edamame whole green soybeans.png', 'frozenfood'),
(141, 'Plein Soleil Frozen Mixed Berries', 'Delicious mix of frozen berries including strawberries, raspberries, and blackberries. Perfect for smoothies or desserts.', '$6.49', '400g', '../images/frozen food/plein soleil frozen mixed berries 400g.avif', 'frozenfood'),
(142, 'Plein Soleil Frozen Strawberries', 'Sweet frozen strawberries, great for desserts, smoothies, or as a topping. Rich in vitamin C.', '$5.99', '400g', '../images/frozen food/plein soleil frozen strawberry 400g.avif', 'frozenfood'),
(143, 'Plein Soleil Frozen Classic Vegetables', 'Classic mix of frozen vegetables including carrots, peas, and green beans. Ready to cook.', '$4.99', '400g', '../images/frozen food/plein soleil frozne classic vegetables 400g.avif', 'frozenfood'),
(144, 'Tabmia Frozen Chicken Escalopes', 'Breaded chicken escalopes, ready to cook. Perfect for quick and tasty meals.', '$8.99', '500g', '../images/frozen food/tabmia frozen chicken escalopes.jpg', 'frozenfood'),
(145, 'Tanmia Frozen Spicy Crispy Chicken Filet', 'Spicy breaded chicken filets with a crispy coating. Just bake or fry for a delicious meal.', '$9.49', '500g', '../images/frozen food/tanmia frozen spicy crispy chicken filet.avif', 'frozenfood'),
(146, 'Bebeto Cola Jelly Gum', 'Chewy cola-flavored jelly gum candies. Perfect for a sweet treat anytime.', '$2.99', '80g', '../images/snacks and candy/bebeto cola jelly gum 80g.webp', 'snacksandcandy'),
(147, 'Biscoff Lotus Spread', 'Delicious cookie butter spread made from crushed Biscoff cookies. Perfect for toast, pancakes, or eating by the spoonful!', '$5.49', '400g', '../images/snacks and candy/biscof lotus spread.jpeg', 'snacksandcandy'),
(148, 'Biscolata Mood Chocolate', 'Creamy milk chocolate with a smooth texture that melts in your mouth.', '$3.99', '120g', '../images/snacks and candy/biscolata.webp', 'snacksandcandy'),
(149, 'Bruschettini Garlic Chips', 'Crispy garlic-flavored chips inspired by Italian bruschetta. Perfect for snacking or with dips.', '$4.29', '150g', '../images/snacks and candy/bruschettini garlic chips.jpg', 'snacksandcandy'),
(150, 'Chupa Chups Lollipops', 'Classic fruit-flavored lollipops with a long-lasting taste. Various flavors available.', '$1.49', '1pc', '../images/snacks and candy/chupa chups lollopops.webp', 'snacksandcandy'),
(151, 'Cocoa Wafer with Cocoa Cream', 'Crispy cocoa wafers layered with rich cocoa cream filling. A chocolate lover\'s delight.', '$2.79', '100g', '../images/snacks and candy/cocoa wafer with cocoa cream.jpeg', 'snacksandcandy'),
(152, 'Croco Crackers Cheese', 'Crunchy cheese-flavored crackers shaped like crocodiles. Fun and tasty snack.', '$3.49', '100g', '../images/snacks and candy/croco crackers cheese 100g.jpg', 'snacksandcandy'),
(153, 'Croco Salted Sticks', 'Thin, crispy salted bread sticks. Perfect for dipping or snacking on their own.', '$2.49', '100g', '../images/snacks and candy/croco salted sticks.jpg', 'snacksandcandy'),
(154, 'Digestive Milk Chocolate Biscuits', 'Classic digestive biscuits covered in smooth milk chocolate. A perfect tea-time treat.', '$4.99', '250g', '../images/snacks and candy/digestive milk chocolate biscuits.jpg', 'snacksandcandy'),
(155, 'Dolsi Peanut Puffs', 'Light and crunchy peanut-flavored puffs. A satisfying savory snack.', '$2.49', '80g', '../images/snacks and candy/dolsi chips peanut puffs 80g.png', 'snacksandcandy'),
(156, 'Dolsi Vinegar Waves', 'Wavy potato chips with tangy vinegar flavor. A classic crisp taste.', '$2.79', '80g', '../images/snacks and candy/dolsi chips waves vinegar 80g.png', 'snacksandcandy'),
(157, 'Dolsi Crunchy Ketchup Puffs', 'Crunchy corn puffs with delicious ketchup flavor. A kid-friendly snack.', '$2.99', '80g', '../images/snacks and candy/dolsi crunchy ketchup puffs 80g.avif', 'snacksandcandy'),
(158, 'Dolsi Pizza Puffs', 'Pizza-flavored corn puffs with herbs and cheese taste. A fun snack alternative.', '$2.99', '80g', '../images/snacks and candy/dolsi pizza puffs.avif', 'snacksandcandy'),
(159, 'Dolsi Twister BBQ', 'Twisted corn snacks with smoky barbecue flavor. Addictively tasty.', '$2.99', '80g', '../images/snacks and candy/dolsi crunchy twister BBQ 80g.jpg', 'snacksandcandy'),
(160, 'English Marble Cake', 'Soft and moist marble cake with swirls of vanilla and chocolate. Perfect with coffee.', '$3.99', '150g', '../images/snacks and candy/engish marble cke.jpg', 'snacksandcandy'),
(161, 'Equia Oat Crackers with Thyme', 'Healthy oat crackers flavored with thyme. Great with cheese or dips.', '$2.49', '50g', '../images/snacks and candy/equia oat crackers thymes 50g.jpeg', 'snacksandcandy'),
(162, 'Erko Mallow Plus Marshmallow', 'Soft and fluffy marshmallows in fun shapes. Perfect for hot chocolate or snacking.', '$1.99', '70g', '../images/snacks and candy/erko marshmallow mallow fun round 70g.jpg', 'snacksandcandy'),
(163, 'Galaxy Smooth Milk Chocolate', 'Creamy milk chocolate that melts smoothly in your mouth. A classic British favorite.', '$1.49', '42g', '../images/snacks and candy/galaxy milk chocolate bar.jpg', 'snacksandcandy'),
(164, 'Halawa Plain', 'Traditional Middle Eastern sesame halva. Sweet, crumbly, and delicious.', '$4.99', '500g', '../images/snacks and candy/halawa plain.webp', 'snacksandcandy'),
(165, 'Ketchup Baked Potato Snips', 'Baked potato chips with tangy ketchup flavor. A lighter crisp option.', '$2.99', '80g', '../images/snacks and candy/ketchup baked potato snips.jpg', 'snacksandcandy'),
(166, 'Kinder Bars', 'Creamy milk chocolate with a milky filling. A favorite among kids and adults.', '$3.49', '4 bars', '../images/snacks and candy/kinder bars.jpg', 'snacksandcandy'),
(167, 'Kinder Joy', 'Fun chocolate egg with a toy surprise inside. Two layers of joy!', '$2.49', '1pc', '../images/snacks and candy/kinder joy.jpg', 'snacksandcandy'),
(168, 'KitKat 4 Fingers', 'Crispy wafer fingers covered in milk chocolate. Perfect for breaking and sharing.', '$1.99', '42g', '../images/snacks and candy/kitkat 4 fingers.avif', 'snacksandcandy'),
(169, 'Kopiko Coffee Candy', 'Coffee-flavored hard candies that give you an energy boost. Made with real coffee extract.', '$3.29', '150g', '../images/snacks and candy/kopiko coffe candy.jpg', 'snacksandcandy'),
(170, 'Krikita Classic Nut Mix', 'Premium mix of roasted nuts including peanuts, almonds, and cashews. A healthy protein snack.', '$5.99', '300g', '../images/snacks and candy/krikita classic nut mix 300g.jpeg', 'snacksandcandy'),
(171, 'Krikita Salted Pumpkin Seeds', 'Roasted and salted pumpkin seeds. Rich in nutrients and full of flavor.', '$3.99', '170g', '../images/snacks and candy/krikita salted pimpkin seeds 170g.jpg', 'snacksandcandy'),
(172, 'Lindt Excellence Extra Creamy', 'Ultra-smooth milk chocolate with an exceptionally creamy texture. Swiss chocolate perfection.', '$4.49', '100g', '../images/snacks and candy/lindt excellence extra creamy.webp', 'snacksandcandy'),
(173, 'Mars Bar', 'Classic combination of nougat and caramel covered in milk chocolate. The original energy bar.', '$1.79', '52g', '../images/snacks and candy/mars bar 52g.jpg', 'snacksandcandy'),
(174, 'Mentos Gum Pure Fresh Mint', 'Sugar-free chewing gum with refreshing mint flavor. Helps freshen breath.', '$3.49', '50g', '../images/snacks and candy/mentos gum pure fresh mint.webp', 'snacksandcandy'),
(175, 'Mentos Gum Pure Fresh Strawberry', 'Sugar-free chewing gum with sweet strawberry flavor. Long-lasting taste.', '$3.49', '50g', '../images/snacks and candy/mentos gum pure fresh strawberry.webp', 'snacksandcandy'),
(176, 'Nutella', 'The world\'s favorite hazelnut spread. Perfect on toast, fruits, or straight from the jar!', '$6.99', '350g', '../images/snacks and candy/nutella.avif', 'snacksandcandy'),
(177, 'Pringles Original Potato Chips', 'Classic stackable potato crisps with the perfect crunch and just the right amount of salt.', '$3.99', '165g', '../images/snacks and candy/pringles original potato chips 165g.avif', 'snacksandcandy'),
(178, 'Skittles Fruits Lollies', 'Chewy fruit-flavored candies that let you taste the rainbow. Various fruity flavors.', '$2.99', '125g', '../images/snacks and candy/skittles fruits lollies bag.png', 'snacksandcandy'),
(179, 'Snickers Bar', 'The perfect combination of nougat, caramel, peanuts, and milk chocolate. Satisfies your hunger.', '$1.79', '50g', '../images/snacks and candy/snickers bar.jpg', 'snacksandcandy'),
(180, 'Snips Baked Salted Potato', 'Baked potato chips with just the right amount of salt. A lighter crisp option.', '$2.49', '80g', '../images/snacks and candy/snips baked salted potato.avif', 'snacksandcandy'),
(181, 'Strawberry Jam', 'Sweet strawberry jam made with real fruit. Perfect for toast, pastries, or desserts.', '$4.29', '370g', '../images/snacks and candy/strawberry jam.jpg', 'snacksandcandy'),
(182, 'Twix Bar', 'Crispy cookie topped with caramel and coated in milk chocolate. Left or right?', '$1.79', '50g', '../images/snacks and candy/twix bar.jpg', 'snacksandcandy'),
(183, 'White BBG Marshmallow', 'Soft and fluffy white marshmallows. Great for hot chocolate, baking, or snacking.', '$3.49', '220g', '../images/snacks and candy/white bbg marshmallow fat free 220g.jpg', 'snacksandcandy'),
(184, 'Wooden Bakery Chocolate Croissant', 'Flaky croissant filled with rich chocolate. A delicious breakfast or snack option.', '$2.49', '60g', '../images/snacks and candy/wooden bakery choclate criossant 60g.avif', 'snacksandcandy'),
(185, 'Organic Eggs', 'Farm-fresh organic eggs from free-range chickens. Rich in protein and essential nutrients. Perfect for breakfast or baking.', '$5.99', 'Pack: 18 pcs', '../images/healthy and organic/organic eggs 18 pcs.webp', 'healthandorganic'),
(186, 'Organic Gluten-Free Oats', '100% pure organic oats, naturally gluten-free. Ideal for porridge, smoothies, or baking. High in fiber and nutrients.', '$4.49', '500g', '../images/healthy and organic/organuc gluten free oats.jpg', 'healthandorganic'),
(187, 'Organic Chia Seeds', 'Nutrient-dense organic chia seeds packed with omega-3s, fiber, and protein. Great for puddings, smoothies, or as an egg substitute.', '$6.99', '300g', '../images/healthy and organic/organic chia seeds.jpg', 'healthandorganic'),
(188, 'Organic Flaxseed', 'Organic golden flaxseeds, rich in fiber and omega-3 fatty acids. Perfect for sprinkling on yogurt, salads, or baking.', '$4.99', '400g', '../images/healthy and organic/organic flaxseed.jpg', 'healthandorganic'),
(189, 'Organic White Quinoa', 'Premium organic quinoa, a complete protein source. Gluten-free and versatile for salads, bowls, or side dishes.', '$7.49', '500g', '../images/healthy and organic/organic white quinoa.webp', 'healthandorganic'),
(190, 'Organic Oat and Honey Granola', 'Crunchy organic granola with oats, honey, and nuts. Perfect for breakfast or as a healthy snack.', '$5.99', '350g', '../images/healthy and organic/organic oat and honey granola.jpg', 'healthandorganic'),
(191, 'Organic Popcorn', 'Organic popcorn kernels for healthy snacking. Non-GMO and perfect for air-popping or stovetop preparation.', '$3.49', '250g', '../images/healthy and organic/organic pocorn.jpg', 'healthandorganic'),
(192, 'Barilla Gluten-Free Penne Pasta', 'Delicious gluten-free pasta made with corn and rice flour. Maintains perfect al dente texture when cooked.', '$2.99', '340g', '../images/healthy and organic/gluten free penne pasta barilla.webp', 'healthandorganic'),
(193, 'Nature Valley Protein Bar', 'Protein-packed snack bar with peanut butter and dark chocolate. 10g of protein per bar for sustained energy.', '$1.49', '40g', '../images/healthy and organic/nature vaelley protein bar peanut butter dark chocolate.jpg', 'healthandorganic'),
(194, 'A Cup Protein Bomb Trio', 'Delicious protein snacks in three flavors. High in protein and perfect for on-the-go nutrition.', '$3.35', '125g', '../images/healthy and organic/Acup protein bomb trio 125g.jpg', 'healthandorganic'),
(195, 'Gatorade Protein Bars', 'Peanut butter chocolate protein bars from Gatorade. 20g of protein per bar for post-workout recovery.', '$9.97', '6 Bars', '../images/healthy and organic/Gatorade peanut butter chocolate protein bars.webp', 'healthandorganic'),
(196, 'Rice Cakes', 'Light and crispy rice cakes made with oats and brown rice. Low calorie and perfect for healthy snacking.', '$0.99', 'Pack: 18 Pieces (155g)', '../images/healthy and organic/equia rice cakes oat.jpg', 'healthandorganic'),
(197, 'Happies Diapers', 'Premium quality diapers for babies with soft absorbent material and comfortable fit.', '$19.99', 'Pack: 50 Diapers', '../images/beauty and personal care/happies daipers.avif', 'beautyandpersonalcare'),
(198, 'Huggies Pure Baby Wipes', 'Gentle, pure baby wipes with 99% water for sensitive skin. Hypoallergenic and alcohol-free.', '$4.99', 'Pack: 56 Wipes', '../images/beauty and personal care/huggies wipes pure 56.webp', 'beautyandpersonalcare'),
(199, 'Johnson\'s Baby Shampoo', 'No more tears formula gently cleanses baby\'s hair and scalp while being mild on eyes.', '$7.99', '750ml', '../images/beauty and personal care/johnson bby shampoo.jpg', 'beautyandpersonalcare'),
(200, 'Baby Blossoms Powder', 'Natural plant-based baby powder that helps keep skin dry and comfortable.', '$3.49', '50g', '../images/beauty and personal care/baby blossoms natural plant based powder.webp', 'beautyandpersonalcare'),
(201, 'Baby Cologne Blue', 'Mild and gentle cologne specially formulated for babies\' delicate skin.', '$4.99', '250ml', '../images/beauty and personal care/baby cologne blue 250ml.webp', 'beautyandpersonalcare'),
(202, 'Head & Shoulders Shampoo', 'Anti-dandruff shampoo that effectively removes flakes and soothes scalp.', '$8.99', '400ml', '../images/beauty and personal care/head and shoulders.avif', 'beautyandpersonalcare'),
(203, 'L\'Oréal Elvive Total Repair 5 Shampoo', 'Repairs 5 signs of damaged hair: split ends, weakness, roughness, dullness, and dehydration.', '$6.49', '400ml', '../images/beauty and personal care/elvive total repair 5 shampoo.webp', 'beautyandpersonalcare'),
(204, 'Garnier Ultra Doux Mythic Olive Shampoo', 'Nourishing shampoo with olive oil for soft, shiny and manageable hair.', '$6.99', '400ml', '../images/beauty and personal care/ultra doux.webp', 'beautyandpersonalcare'),
(205, 'Lux Soft Rose Body Wash', 'Luxurious body wash with soft rose fragrance that leaves skin feeling silky smooth.', '$8.49', '1L', '../images/beauty and personal care/lux body wash.webp', 'beautyandpersonalcare'),
(206, 'Bath Shower Sponge', 'Soft and durable shower sponge for gentle exfoliation and rich lather.', '$2.50', '1 piece', '../images/beauty and personal care/bath shower sponge.webp', 'beautyandpersonalcare'),
(207, 'Dettol Hand Wash', 'Antibacterial hand wash that kills 99.9% of germs while being gentle on skin.', '$4.50', '250ml', '../images/beauty and personal care/dettol hand wash.webp', 'beautyandpersonalcare'),
(208, 'Lifebuoy Total 10 Soap', 'Antibacterial soap offering complete protection against 10 infection-causing germs.', '$1.99', '125g', '../images/beauty and personal care/lifebuoy soap.jpg', 'beautyandpersonalcare'),
(209, 'Crest Cavity Protection Toothpaste', 'Fluoride toothpaste that strengthens teeth and helps prevent cavities.', '$2.99', '120g', '../images/beauty and personal care/crest cavity protection toothpaste.jpg', 'beautyandpersonalcare'),
(210, 'Oral-B Medium Toothbrush', 'Medium bristle toothbrush with ergonomic handle for effective cleaning.', '$3.99', '1 piece', '../images/beauty and personal care/oral-B toothbrush.webp', 'beautyandpersonalcare'),
(211, 'Cotton Buds', 'Double-tipped cotton buds for precise application and gentle cleaning.', '$1.99', '200 pcs', '../images/beauty and personal care/cotton buds.png', 'beautyandpersonalcare'),
(212, 'Cotton Pads', 'Soft and absorbent cotton pads for makeup removal and skincare application.', '$2.29', '70 pcs', '../images/beauty and personal care/cotton pads.jpeg', 'beautyandpersonalcare'),
(213, 'Always Soft Ultra Thin Pads', 'Ultra thin pads with soft cover for comfort and reliable protection.', '$2.80', '10 Pads', '../images/beauty and personal care/always soft ultra thin pads 10.avif', 'beautyandpersonalcare'),
(214, 'Clipp Universal Cream', 'Moisturizing cream for hands and body that provides long-lasting hydration.', '$3.99', '100ml', '../images/beauty and personal care/clip hand cream.webp', 'beautyandpersonalcare'),
(215, 'Elegance Extra Strong Gel', 'Strong hold hair gel for defined styles that last all day.', '$5.99', '250ml', '../images/beauty and personal care/elegance extra strong gel.webp', 'beautyandpersonalcare'),
(216, 'Elsada Nail Polish Remover', 'Effective nail polish remover that gently removes polish without drying nails.', '$1.60', '250ml', '../images/beauty and personal care/elsada nail polish remover.webp', 'beautyandpersonalcare'),
(217, 'Gillette Mach3 Turbo Razor', 'Men\'s razor with 3 anti-friction blades for a close, comfortable shave.', '$12.49', '1 Razor + 2 Blades', '../images/beauty and personal care/gillette mach3 turbo men\'s razor.jpg', 'beautyandpersonalcare'),
(218, 'Speed Stick Men\'s Deodorant', '24-hour odor and wetness protection in an easy-to-use stick format.', '$5.49', '85g', '../images/beauty and personal care/speed stick men deodprant.jpg', 'beautyandpersonalcare'),
(219, 'Lady Speed Stick', 'Reliable odor protection for women in a gentle, effective formula.', '$3.99', '45g', '../images/beauty and personal care/lady speed stick.webp', 'beautyandpersonalcare'),
(220, 'Garnier Micellar Cleansing Water', 'Gentle micellar water that removes makeup and cleanses skin without rinsing.', '$7.99', '400ml', '../images/beauty and personal care/garnier micellar water.webp', 'beautyandpersonalcare'),
(221, 'Vaseline Jelly', 'Pure petroleum jelly that helps heal dry skin and lock in moisture.', '$4.99', '100g', '../images/beauty and personal care/vaseline jelly 100g.png', 'beautyandpersonalcare'),
(222, 'Vaseline Intensive Care Tea Body Lotion', 'Nourishing body lotion with tea extracts that deeply moisturizes dry skin.', '$5.99', '400ml', '../images/beauty and personal care/vasline intensive care tea body lotion\'.avif', 'beautyandpersonalcare'),
(223, 'Vaseline Aloe Vera Lip Therapy', 'Soothing lip balm with aloe vera that helps heal and protect dry lips.', '$2.99', '4.8g', '../images/beauty and personal care/vaseline lip therapy aloe vera balm stick.jpg', 'beautyandpersonalcare'),
(224, 'Clorox Bleach', 'Powerful disinfecting bleach that kills 99.9% of germs and bacteria. Great for laundry and household cleaning.', '$3.50', '950ml', '../images/cleaning and household/clorox bleach.jpeg', 'cleaningandhousehold'),
(225, 'Dettol Liquid Disinfectant', 'Antiseptic liquid that kills germs and provides protection against infection. Can be used for cleaning, laundry, and personal hygiene.', '$5.00', '750ml', '../images/cleaning and household/dettol liquid disinfectant.jpg', 'cleaningandhousehold'),
(226, 'Dishwashing Soap', 'Lemon-scented dishwashing liquid that cuts through grease and leaves dishes sparkling clean.', '$2.00', '1L', '../images/cleaning and household/fairy lemon dish washing liquid soap.jpg', 'cleaningandhousehold'),
(227, 'Flash Bathroom Cleaner', 'Powerful bathroom cleaner that removes limescale, soap scum, and tough stains. Leaves surfaces clean and fresh.', '$3.00', '450ml', '../images/cleaning and household/flash bowm.avif', 'cleaningandhousehold'),
(228, 'Easy Glass Cleaner', 'Streak-free glass cleaner for windows, mirrors, and glass surfaces. Leaves a sparkling shine.', '$2.50', '825ml', '../images/cleaning and household/easy glass cleaner.avif', 'cleaningandhousehold'),
(229, 'Facial Soft Tissue Pack', 'Soft and gentle facial tissues for everyday use. Pack of 200 2-ply tissues.', '$1.20', 'Pack: 200 Tissues (2-ply)', '../images/cleaning and household/facial soft tissue pack.jpg', 'cleaningandhousehold'),
(230, 'Large Trash Bags (30 pcs)', 'Durable trash bags with drawstring closure. Pack of 30 large bags for heavy-duty use.', '$4.00', 'Size: 80x110cm', '../images/cleaning and household/large trash bags 30pcs.avif', 'cleaningandhousehold'),
(231, 'OMO Laundry Detergent', 'Powerful laundry detergent that removes tough stains while being gentle on fabrics.', '$9.50', '5 kg', '../images/cleaning and household/omo laundry.webp', 'cleaningandhousehold'),
(232, 'Persil Lavender Powder', 'Lavender-scented laundry powder with powerful stain removal and long-lasting freshness.', '$12.00', '6 kg', '../images/cleaning and household/persil lavender powder.avif', 'cleaningandhousehold'),
(233, 'Sanita Aluminum Foil', 'High-quality aluminum foil for cooking, baking, and food storage. 30cm wide roll.', '$3.00', '30 cm x 150 m', '../images/cleaning and household/sanita aluminum foil.jpg', 'cleaningandhousehold'),
(234, 'Sanita Cling Film', 'Plastic cling wrap for food preservation. Sticks to itself and containers to keep food fresh.', '$2.50', '30 cm x 300 m', '../images/cleaning and household/sanita cling film.png', 'cleaningandhousehold'),
(235, 'Scotch-Brite Kitchen Sponge', 'Dual-sided kitchen sponge with scrubbing side for tough stains and soft side for delicate surfaces.', '$1.20', 'Pack: 2 Sponges', '../images/cleaning and household/scotch brite kitchen tough cleaning dual sided sponge.jpg', 'cleaningandhousehold'),
(236, 'Scouring Kitchen Pads', 'Heavy-duty scouring pads for tough cleaning jobs on pots, pans, and cookware.', '$1.00', 'Pack: 5 Pads', '../images/cleaning and household/scouring kitchen pads.avif', 'cleaningandhousehold'),
(237, 'Steel Sponges', 'Stainless steel cleaning sponges for removing stubborn stains and burnt-on food.', '$1.50', 'Pack: 3 Sponges', '../images/cleaning and household/steel sponges.jpg', 'cleaningandhousehold'),
(238, 'Toilet Tissues', 'Soft and strong 2-ply toilet paper. Pack of 10 rolls for household use.', '$4.00', 'Pack: 10 Rolls (2-ply)', '../images/cleaning and household/tiolet tissues.webp', 'cleaningandhousehold'),
(239, 'Al Fakher Grape Hookah Tobacco', 'Premium grape-flavored hookah tobacco from Al Fakher. Smooth smoke with authentic grape flavor.', '$14.99', '250g', '../images/tobacco/al fakher graapes.jpeg', 'tobacco'),
(240, 'Al Fakher Two Apples Hookah Tobacco', 'Classic two apples flavored hookah tobacco. A perfect balance of sweet and tart apple flavors.', '$14.99', '250g', '../images/tobacco/two apples.jpg', 'tobacco'),
(241, 'Allure Superslims White Cigarettes', 'Premium superslim white cigarettes with smooth taste and elegant design.', '$5.00', '20 cigarettes', '../images/tobacco/allre supeslims white.jpg', 'tobacco'),
(242, 'Allure Black Superslims Cigarettes', 'Sleek black superslim cigarettes with rich, full flavor in an elegant package.', '$5.00', '20 cigarettes', '../images/tobacco/aluure black superslims.webp', 'tobacco'),
(243, 'Coconut Charcoal Cubes', 'Natural coconut shell charcoal cubes for hookah. Long-lasting, odorless, and provides even heat.', '$10.00', '1kg', '../images/tobacco/ccocnut charcoal cubes.jpg', 'tobacco');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `review_text`, `rating`, `created_at`) VALUES
(1, 'Sarah H.', 'Amazing fresh products! My go-to grocery store.', 5, '2025-04-19 22:53:17'),
(2, 'Daniel M.', 'Good selection of products, but the prices could be better.', 4, '2025-04-19 22:53:17'),
(3, 'Jessica T.', 'Quick delivery and great customer service, highly recommended!', 5, '2025-04-19 22:53:17'),
(4, 'John B.', 'The quality is great, but sometimes I have trouble finding certain items.', 3, '2025-04-19 22:53:17'),
(5, 'Anna W.', 'The website is easy to use, but the selection of organic food is lacking.', 3, '2025-04-19 22:53:17'),
(6, 'malak khalil', 'perfect', 5, '2025-04-19 23:20:36'),
(7, 'dima', 'fast delivery!!!!!!!!!!1', 5, '2025-04-19 23:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Email` varchar(254) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Fname`, `Lname`, `phone`, `username`, `Email`, `address`, `Password`) VALUES
(1, 'Layla', 'Hassan', '+96170111222', 'laylahassan', 'layla@gmail.com', '123 Cedar St, Beirut', 'password123'),
(2, 'Omar', 'Salem', '+96170123456', 'omarsalem', 'omar.salem@gmail.com', '45 Elm Ave, Tripoli', 'omarsafe456'),
(3, 'Maya', 'Khalil', '+96170345678', 'mayakhalil', 'maya.k@gmail.com', 'XX Street, Merdacheh, Botchay', 'maya_pass789'),
(4, 'Jad', 'Mansour', '+96170987654', 'jadmansour', 'jad.m@gmail.com', '9 Olive Blvd, Jounieh', 'jadstrong!'),
(5, 'Rana', 'Fadel', '+96170654321', 'ranafadel', 'rana.f@gmail.com', '230 Palm St, Zahle', 'ranarocks'),
(6, 'Kassem', 'Ali', '+96176456789', 'kassemali', 'kassem.ali@gmail.com', '123 Maple St, Hadath', 'kassem2024'),
(7, 'Nadine', 'Jabbour', '+96171765432', 'nadinej', 'nadine.jabbour@gmail.com', '56 Oak Ave, Baabda', 'nadinepass99'),
(8, 'Tariq', 'Kassem', '+96176543210', 'tariqk', 'tariq.kassem@hotmail.com', '98 Cedar Rd, Jounieh', 'tariq1234'),
(9, 'Sami', 'Khalil', '+96178551122', 'samikhalil', 'sami.khalil@yahoo.com', '101 Palm Blvd, Beirut', 'sammy2000'),
(10, 'Rami', 'El-Sayed', '+96179887766', 'ramielsayed', 'rami.elsayed@outlook.com', '77 Sunflower St, Sin El Fil', 'rami@456'),
(11, 'malak', 'khalil', '71233806', 'malakxkhalil', 'malak.khalil@lau.edu', 'madam curie', '$2y$10$t4l4yISLeAIQSzm5R.p/GetLiA/XA2Sh7huOtA6/P3jkSj3Vbhx8G');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
