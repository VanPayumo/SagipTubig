-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 04:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sagiptubig`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us - Our Story', '\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,\r\n', 'Rhone was the collective vision of a small group of weekday warriors. For years, we were frustrated by the lack of activewear designed for men and wanted something better. With that in mind, we set out to design premium apparel that is made for motion and engineered to endure.\r\n\r\nAdvanced materials and state of the art technology are combined with heritage craftsmanship to create a new standard in activewear. Every product tells a story of premium performance, reminding its wearer to push themselves physically without having to sacrifice comfort and style.\r\n\r\nBeyond our product offering, Rhone is founded on principles of progress and integrity. Just as we aim to become better as a company, we invite men everywhere to raise the bar and join us as we move Forever Forward.');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL,
  `access_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`, `access_level`) VALUES
(1, 'Van Ezekiel Payumo', 'payumo.van657@gmail.com', 'admin01', 'Space_Day_Nautilus_profileicon.png', '09773326250', 'Philippines', 'Superadmin', ' Backend boi ', 1),
(2, 'Louis Andrei Suba', 'lasuba.24@gmail.com', 'admin01', 'Space_Day_Nautilus_profileicon.png', '09000000000', 'Philippines', 'Product Designer', 'Governor', 1),
(3, 'Michenne Cortez', 'mich.cortez@gmail.com', 'admin01', 'Space_Day_Nautilus_profileicon.png', '09000000000', 'Philippines', 'Front-end Designer', 'Dasayn is my passion', 1),
(4, 'Ann Catherine De Guia', 'acdeguia@gmail.com', 'admin01', 'Space_Day_Nautilus_profileicon.png', '09000000000', 'Philippines', 'Front-End Designer', 'Dasayn is my passion ', 1),
(5, 'Ram Keazar Medina', 'rammedina@gmail.com', 'admin01', 'Space_Day_Nautilus_profileicon.png', '09000000000', 'Philippines', 'Website Developer', 'Pro-gamer', 1),
(6, 'Level Two', 'accesslevel2@gmail.com', 'level2', 'user-profile-min.png', '09000000000', 'Philippines', 'Manager', 'Fewer features compared to Level 1 (Superadmin)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL,
  `p_bundle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'ecomstore@mail.com', 'Contact Us', 'If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(1, 5, 'SagipTumbler', '3000', 'SGPTBGTMBLR', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(1, 'Customer One', 'c1@mail.com', 'customer1', 'Philippines', 'Porac', '09000000000', 'Porac, Pampanga', 'user-icn-min.png', '::1', '1500724236'),
(2, 'Customer Two', 'c2@mail.com', 'c2', 'Philippines', 'Porac', '09000000002', 'Porac, Pampanga', 'user-icn-min.png', '::1', '1322407311'),
(3, 'Customer Three', 'c3@mail.com', 'c3', 'Philippines', 'Nowhere', '0900 000 0003', 'Nowhere', 'sample_image.jpg', '::1', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_log_history`
--

CREATE TABLE `customer_log_history` (
  `log_id` int(11) NOT NULL,
  `cid` int(10) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_log_history`
--

INSERT INTO `customer_log_history` (`log_id`, `cid`, `c_email`, `log_time`, `activity`) VALUES
(1, 1, 'c1@mail.com', '2022-01-22 11:22:27', 'Registered'),
(2, 1, 'c1@mail.com', '2022-01-22 13:45:44', 'Logged in'),
(3, 1, 'c1@mail.com', '2022-01-22 13:51:11', 'Logged in'),
(4, 1, 'c1@mail.com', '2022-01-22 14:35:27', 'Logged in'),
(5, 1, 'c1@mail.com', '2022-01-22 18:02:51', 'Logged in'),
(6, 1, 'c1@mail.com', '2022-01-22 18:18:35', 'Logged in'),
(7, 2, 'c2@mail.com', '2022-01-23 05:19:29', 'Registered'),
(8, 2, 'c2@mail.com', '2022-01-23 09:47:09', 'Logged in'),
(9, 2, 'c2@mail.com', '2022-01-24 10:37:39', 'Logged in'),
(10, 2, 'c2@mail.com', '2022-01-24 10:43:21', 'Logged in'),
(11, 2, 'c2@mail.com', '2022-01-24 11:18:19', 'Logged in'),
(12, 2, 'c2@mail.coma', '2022-01-24 11:19:08', 'Logged in'),
(13, 2, 'c2@mail.com', '2022-01-24 11:23:08', 'Logged in'),
(14, 2, 'c2@mail.com', '2022-01-24 11:55:51', 'Logged in'),
(15, 3, 'c3@mail.com', '2022-01-24 12:19:42', 'Registered'),
(16, 3, 'c3@mail.com', '2022-01-25 01:44:28', 'Logged in'),
(17, 1, 'c1@mail.com', '2022-01-25 03:20:59', 'Logged in'),
(18, 1, 'c1@mail.com', '2022-01-25 03:24:10', 'Logged in');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 1, 1500, 503609498, 1, 'Small', '2022-01-22 14:22:15', 'Returned'),
(2, 1, 600, 524728322, 2, 'Medium', '2022-01-22 14:23:31', 'Complete'),
(3, 1, 1000, 1684061789, 1, ' Small ', '2022-01-22 18:03:16', 'Complete'),
(4, 1, 498, 1684061789, 2, 'Medium', '2022-01-22 18:03:16', 'pending'),
(5, 1, 750, 1684061789, 1, 'Medium', '2022-01-22 18:03:16', 'pending'),
(6, 2, 300, 467067830, 1, 'Small', '2022-01-23 05:49:36', 'Returned'),
(7, 2, 2000, 1090552124, 2, ' Small ', '2022-01-24 11:07:06', 'Complete'),
(8, 2, 1245, 1090552124, 5, 'Medium', '2022-01-24 11:07:06', 'Complete'),
(9, 2, 6000, 131924124, 2, 'Small', '2022-01-24 12:17:53', 'Complete'),
(10, 3, 1500, 1107354270, 1, 'Small', '2022-01-24 12:27:17', 'Complete'),
(11, 3, 1500, 2057823277, 2, 'Small', '2022-01-24 12:28:59', 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `logo_title`
--

CREATE TABLE `logo_title` (
  `id` int(10) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo_title`
--

INSERT INTO `logo_title` (`id`, `site_logo`, `site_title`) VALUES
(1, 'component.png', 'SagipTubig');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `payment_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `invoice_no`, `amount`, `payment_mode`, `payment_date`, `status`) VALUES
(1, 1, 503609498, 1500, 'Cash On Delivery (COD)', '2022-01-22 22:22:41', 'Returned'),
(2, 2, 524728322, 600, 'Cash On Delivery (COD)', '2022-01-22 22:23:42', 'Paid'),
(3, 3, 1684061789, 1000, 'Cash On Delivery (COD)', '2022-01-23 02:03:25', 'Paid'),
(4, 6, 467067830, 300, 'Cash On Delivery (COD)', '2022-01-23 13:54:52', 'Returned'),
(5, 7, 1090552124, 2000, 'Cash On Delivery (COD)', '2022-01-24 19:23:14', 'Paid'),
(6, 8, 1090552124, 1245, 'Cash On Delivery (COD)', '2022-01-24 19:23:19', 'Paid'),
(7, 9, 131924124, 6000, 'Cash On Delivery (COD)', '2022-01-24 20:17:59', 'Paid'),
(8, 10, 1107354270, 1500, 'Cash On Delivery (COD)', '2022-01-24 20:27:26', 'Paid'),
(9, 11, 2057823277, 1500, 'Cash On Delivery (COD)', '2022-01-24 20:29:04', 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 1, 503609498, '1', 1, 'Small', 'Returned'),
(2, 1, 524728322, '2', 2, 'Medium', 'Complete'),
(3, 1, 1684061789, '1', 1, ' Small ', 'Complete'),
(4, 1, 1684061789, '2', 2, 'Medium', 'pending'),
(5, 1, 1684061789, '3', 1, 'Medium', 'pending'),
(6, 2, 467067830, '2', 1, 'Small', 'Returned'),
(7, 2, 1090552124, '1', 2, ' Small ', 'Complete'),
(8, 2, 1090552124, '2', 5, 'Medium', 'Complete'),
(9, 2, 131924124, '5', 2, 'Small', 'Complete'),
(10, 3, 1107354270, '1', 1, 'Small', 'Complete'),
(11, 3, 2057823277, '3', 2, 'Small', 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_psp_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_stock`, `product_keywords`, `product_label`, `status`) VALUES
(1, 7, 0, 0, '2022-01-24 12:27:17', 'Sagip Jacket', 'sagip-jacket', 'SagipJacket1.png', 'SagipJacket1.png', 'SagipJacket1.png', 1500, 1000, '\r\nTBD\r\n', '\r\nTBD\r\n', 5, 'Sagip Jacket', 'New', 'bundle'),
(2, 5, 0, 0, '2022-01-24 11:07:06', 'Sagip Pad', 'sagip-pad', 'SagipPad.png', 'SagipPad3.png', 'SagipPad2.png', 300, 249, '\r\n\r\n\r\nTBD\r\n\r\n\r\n', '\r\n\r\n\r\nTBD\r\n\r\n\r\n', 0, 'Sagip Pad', 'New', 'bundle'),
(3, 9, 0, 0, '2022-01-24 12:28:59', 'Sagip Sweatshirt', 'sagip-sweatshirt', 'Sagip Sweatshirt 2 .png', 'Sagip Sweatshirt 1.png', 'Sagip Sweatshirt 2 .png', 1500, 750, '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nTBD\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nTBD\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 7, 'Sweatshirt', 'Sale', 'product'),
(4, 9, 0, 0, '2022-01-22 16:30:17', 'Sagip Bag', 'sagip-bag', 'SagipPad3.png', 'Sagib Bag 1.png', 'SagipBag2 .png', 1400, 1150, '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nTBD\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nTBD\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 10, 'Bag', 'New', 'product'),
(5, 9, 0, 0, '2022-01-24 12:17:53', 'Sagip Tumbler', 'sagip-tumbler', 'Sagip Water 1.png', 'Sagip Water 2.png', 'Sagip Water 1.png', 5000, 4000, 'TBD\r\n\r\n', '\r\n\r\n\r\nTBD\r\n\r\n\r\n', 8, 'Tumbler', 'New', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_image`) VALUES
(4, 'Coats', 'coaticn.png'),
(5, 'Mousepads', 'tshirticn.png'),
(6, 'Sweater', 'sweatericn.png'),
(7, 'Jackets', 'jacketicn.png'),
(8, 'Sneakers', 'sneakericn.png'),
(9, 'Trousers', 'trousericn.png');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `return_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `return_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `invoice_no`, `amount`, `payment_mode`, `return_date`) VALUES
(1, 503609498, 1500, 'Cash On Delivery (COD)', '2022-01-22 14:23:56'),
(2, 467067830, 300, 'Cash On Delivery (COD)', '2022-01-24 11:55:55'),
(3, 2057823277, 1500, 'Cash On Delivery (COD)', '2022-01-24 12:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Rules And Regulations', 'rules', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.&nbsp;</p>'),
(2, 'Refund Policy', 'link2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on'),
(3, 'Pricing and Promotions Policy', 'link3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on');

-- --------------------------------------------------------

--
-- Table structure for table `user_log_history`
--

CREATE TABLE `user_log_history` (
  `log_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log_history`
--

INSERT INTO `user_log_history` (`log_id`, `u_id`, `u_email`, `log_time`, `activity`) VALUES
(1, 1, 'payumo.van657@gmail.com', '2022-01-22 10:56:51', 'Registered'),
(2, 1, 'payumo.van657@gmail.com', '2022-01-22 10:59:16', 'Logged in'),
(3, 2, 'lasuba.24@gmail.com', '2022-01-22 11:13:09', 'Registered'),
(4, 3, 'mich.cortez@gmail.com', '2022-01-22 11:14:40', 'Registered'),
(5, 4, 'acdeguia@gmail.com', '2022-01-22 11:15:28', 'Registered'),
(6, 5, 'rammedina@gmail.com', '2022-01-22 11:16:50', 'Registered'),
(7, 6, 'accesslevel2@gmail.com', '2022-01-22 11:18:52', 'Registered'),
(8, 1, 'payumo.van657@gmail.com', '2022-01-22 13:46:25', 'Logged in'),
(9, 6, 'accesslevel2@gmail.com', '2022-01-22 13:47:02', 'Logged in'),
(10, 3, 'mich.cortez@gmail.com', '2022-01-22 13:49:23', 'Logged in'),
(11, 1, 'payumo.van657@gmail.com', '2022-01-22 14:19:06', 'Logged in'),
(12, 1, 'payumo.van657@gmail.com', '2022-01-23 05:55:51', 'Logged in'),
(13, 2, 'lasuba.24@gmail.com', '2022-01-23 09:51:34', 'Logged in'),
(14, 6, 'accesslevel2@gmail.com', '2022-01-23 10:07:18', 'Logged in'),
(15, 1, 'payumo.van657@gmail.com', '2022-01-23 10:25:44', 'Logged in'),
(16, 4, 'acdeguia@gmail.com', '2022-01-23 10:40:57', 'Logged in'),
(17, 6, 'accesslevel2@gmail.com', '2022-01-23 11:29:20', 'Logged in'),
(18, 1, 'payumo.van657@gmail.com', '2022-01-24 09:27:43', 'Logged in'),
(19, 2, 'lasuba.24@gmail.com', '2022-01-24 11:07:33', 'Logged in'),
(20, 1, 'payumo.van657@gmail.com', '2022-01-24 12:12:59', 'Logged in'),
(21, 1, 'payumo.van657@gmail.com', '2022-01-24 12:18:27', 'Logged in'),
(22, 1, 'payumo.van657@gmail.com', '2022-01-25 03:21:37', 'Logged in');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(1, 2, 3),
(3, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_log_history`
--
ALTER TABLE `customer_log_history`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `logo_title`
--
ALTER TABLE `logo_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `user_log_history`
--
ALTER TABLE `user_log_history`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_log_history`
--
ALTER TABLE `customer_log_history`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `return_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_log_history`
--
ALTER TABLE `user_log_history`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
