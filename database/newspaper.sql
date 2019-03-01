-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 04:10 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newspaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(19, 'বাংলাদেশ', 'বাংলাদেশের সব খবর', 'Active', '2019-02-23 14:34:10', '2019-03-01 08:36:04'),
(20, 'আন্তর্জাতিক', 'আন্তর্জাতিক সকল খবর', 'Active', '2019-02-23 14:34:40', '2019-02-23 14:34:40'),
(21, 'অর্থনীতি', 'অর্থনীতি  সব খবর', 'Active', '2019-02-23 14:35:27', '2019-02-23 14:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 'Rifat', 'shakilfci461@gmail.com', '018', 'dsfsad', '2019-02-26 13:45:18', '2019-02-26 13:45:18'),
(2, 2, 'niloy', 'asd@gmail.com', '018', 'sdfas', '2019-02-26 13:55:00', '2019-02-26 13:55:00'),
(3, 4, 'Shakil Ahmmed', 'shakilfci461@gmail.com', '01849942053', 'This is Bad', '2019-02-26 14:28:00', '2019-02-26 14:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_20_161430_category', 1),
(4, '2019_02_20_210541_create_sub_category', 2),
(6, '2019_02_21_201419_setup', 4),
(7, '2019_02_21_144116_create_post', 5),
(8, '2019_02_26_190045_create-commernts', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `likes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category_name`, `sub_category_name`, `post_title`, `short_description`, `long_description`, `image`, `counter`, `likes`, `created_at`, `updated_at`) VALUES
(1, 'বাংলাদেশ', 'রাজনীতি', 'মেট্রোরেলের কাজ কবে শেষ, জানালেন কাদের', 'সড়ক পরিবহন ও সেতুমন্ত্রী ওবায়দুল কাদের বলেছেন, ২০২০ সালের ডিসেম্বরের মধ্যে মেট্রোরেলের পুরো কাজ শেষ হবে। আর উত্তরা থেকে আগারগাঁও পর্যন্ত ২০১৯ সালের ডিসেম্বরেই শেষ হবে।', 'সড়ক পরিবহন ও সেতুমন্ত্রী ওবায়দুল কাদের বলেছেন, ২০২০ সালের ডিসেম্বরের মধ্যে মেট্রোরেলের পুরো কাজ শেষ হবে। আর উত্তরা থেকে আগারগাঁও পর্যন্ত ২০১৯ সালের ডিসেম্বরেই শেষ হবে।  সেতুমন্ত্রী ওবায়দুল কাদের আজ সোমবার বিকেলে রাজধানীর ফার্মগেটের খামারবাড়ি কৃষিবিদ ইনস্টিটিউশনের সামনে এমআরটি লাইন ৬-এর প্যাকেজ ৫-এর উদ্বোধন করে এসব কথা বলেন। তিনি বলেন, রাজধানীর উত্তরা থেকে মতিঝিল পর্যন্ত দেশের প্রথম মেট্রোরেলের নির্মাণ প্রকল্পের স্টিল স্ক্রু পাইল ড্রাইভিংয়ের কাজ শুরু হয়েছে।  মেট্রোরেল নির্মাণ প্রকল্পের নির্মাণকাজের অগ্রগতি তুলে ধরে ওবায়দুল কাদের বলেন, ‘২০২০ সালের ডিসেম্বরের মধ্যে মেট্রোরেলের পুরো কাজ শেষ হবে। আর উত্তরা থেকে আগারগাঁও পর্যন্ত ২০১৯ সালের ডিসেম্বরেই শেষ হবে।’ তিনি বলেন, ‘মেট্রোরেলের ২৫০০ মিটার ভায়াডাক্ট দৃশ্যমান হয়েছে। আগারগাঁও থেকে কারওয়ান বাজার পর্যন্ত ৩ দশমিক ১৯৫ কিমি ভায়াডাক্ট ও তিনটি স্টেশন নির্মাণের জন্য পরিষেবা স্থানান্তর ও চেকবোরিং সম্পন্ন হয়েছে। তিনি আরও জানান, ১৯৭টি ট্রায়াল পিটের মধ্যে ৩৫টি ট্রায়াল পিট এবং ৪৫০টি বোরড পাইলের মধ্যে ৩টি বোরড পাইল সম্পন্ন হয়েছ।  আগামী এপ্রিলে মেট্রোরেলের নির্মাণকাজ শুরু হবে', 'backend_asset/images/Post/1551111205.jpg', '2', '3', '2019-02-25 10:13:25', '2019-02-27 11:04:18'),
(2, 'বাংলাদেশ', 'রাজনীতি', 'রাজনৈতিক দুর্নীতি, মেগা দুর্নীতির বিরুদ্ধে ব্যবস্থা ও দুর্নীতি মামলার দ্রুত নিষ্পত্তি চায় নাগরিক সমাজ', 'বড় দুর্নীতিবাজদের বিরুদ্ধে দুর্নীতি দমন কমিশনের (দুদক) কঠোর দৃশ্যমান কার্যক্রম দেখতে চান নাগরিক সমাজের প্রতিনিধিরা। দুদকের প্রতি সাধারণ মানুষের আস্থা ও বিশ্বাস তৈরিতে স্বাস্থ্য, শিক্ষা ও ব্যাংক খাতের পাশাপাশি রাজনৈতিক দুর্নীতি ও মেগা দুর্নীতির ওপর বেশি নজর দেওয়া জরুরি। দুর্নীতি মামলার দ্রুত নিষ্পত্তি করাও জরুরি।', 'বড় দুর্নীতিবাজদের বিরুদ্ধে দুর্নীতি দমন কমিশনের (দুদক) কঠোর দৃশ্যমান কার্যক্রম দেখতে চান নাগরিক সমাজের প্রতিনিধিরা। দুদকের প্রতি সাধারণ মানুষের আস্থা ও বিশ্বাস তৈরিতে স্বাস্থ্য, শিক্ষা ও ব্যাংক খাতের পাশাপাশি রাজনৈতিক দুর্নীতি ও মেগা দুর্নীতির ওপর বেশি নজর দেওয়া জরুরি। দুর্নীতি মামলার দ্রুত নিষ্পত্তি করাও জরুরি।  আজ সোমবার রাজধানীর সেগুনবাগিচায় দুদকের প্রধান কার্যালয়ে এক মতবিনিময় অনুষ্ঠানে এসব কথা বলেছেন নাগরিক সমাজের প্রতিনিধিরা। কমিশনের ২০১৯ সালের কৌশলপত্র প্রণয়ন করার জন্য মতামত নিতে এ মতবিনিময় অনুষ্ঠানের আয়োজন করে দুদক।  অনুষ্ঠানে বিশ্বসাহিত্য কেন্দ্রের প্রতিষ্ঠাতা সভাপতি আবদুল্লাহ আবু সায়ীদ বলেন, বাংলাদেশের প্রধান দুঃখ দুর্নীতি। দুর্নীতির বিষয়ে হতাশা বিশাল। আর দুদকের কাছে মানুষের গগনচুম্বী প্রত্যাশা। দুদক কাজ করছে। রাষ্ট্র ধীরে ধীরে সব বিষয়ে তৈরি হচ্ছে। আস্তে আস্তে রাষ্ট্র শক্ত অবস্থানে আসছে। তবে রাতারাতি সব হয় না। এক দিনে করা কঠিন।  আবদুল্লাহ আবু সায়ীদ বলেন, দুদকের প্রতি জনগণের আস্থা জাগে নাই। তাই দুদককে অবিলম্বে দৃশ্যমান কিছু ঘটনা ঘটিয়ে দেখাতে হবে। কয়েকটি কাজ করেছে ইতিমধ্যে। তবে জনগণকে আস্থায় আনতে অন্তত ২০টি ঘটনা ঘটিয়ে একটি ম্যাসেজ দিতে হবে, যাতে মানুষ মনে করে অপরাধ করলে শাস্তি পেতে হয়।', 'backend_asset/images/Post/1551111320.jpg', '15', '1', '2019-02-25 10:15:20', '2019-02-26 14:31:31'),
(3, 'আন্তর্জাতিক', 'আমেরিকা', 'সিবিআইয়ের কোপে তৃণমূল', 'পশ্চিমবঙ্গের তৃণমূল কংগ্রেস আবার সিবিআইয়ের কোপে পড়েছে। সারদা পশ্চিমবঙ্গের একটি ক্ষুদ্র আর্থিক প্রতিষ্ঠান বা চিটফান্ডের নাম।', 'পশ্চিমবঙ্গের তৃণমূল কংগ্রেস আবার সিবিআইয়ের কোপে পড়েছে। সারদা পশ্চিমবঙ্গের একটি ক্ষুদ্র আর্থিক প্রতিষ্ঠান বা চিটফান্ডের নাম। ২০১৩ সালে কোটি কোটি টাকার অর্থ আত্মসাতের ঘটনা ফাঁস হয়ে পড়লে সারদা চিটফান্ডের কথা প্রকাশ্যে আসে। শুরু হয় সিবিআইয়ের তদন্ত। সেই তদন্ত এখনো চলছে। এ নিয়ে মামলা গড়ায় ভারতের সুপ্রিম কোর্টেও।  ১৮ ফেব্রুয়ারি সারদাসহ অন্যান্য চিটফান্ডের আর্থিক দুর্নীতির এক তদন্ত প্রতিবেদন সিবিআইয়ের পুলিশ সুপার পি সি কল্যাণ অতিরিক্ত একটি হলফনামার মাধ্যমে পেশ করেন সুপ্রিম কোর্টে। সেই হলফনামায় সিবিআই প্রকাশ করে সারদার অর্থ নয়ছয়ের বিষয়; কার্যত, পশ্চিমবঙ্গের তৃণমূল সরকারের বিরুদ্ধে।  এতে বলা হয়, সারদার আর্থিক কেলেঙ্কারি ফাঁস হওয়ার পর সারদার মালিকানাধীনে থাকা ‘তারা’ টিভিকে পশ্চিমবঙ্গ সরকার ২৩ মাস ধরে মাসে ২৭ লাখ রুপি করে রাজ্য সরকারের ত্রাণ তহবিল থেকে বেআইনিভাবে দিয়েছিল। ২০১৩ সালের মে মাস থেকে ২০১৫ সালের এপ্রিল পর্যন্ত এই ২৩ মাসে এটি দেওয়া হয়।', 'backend_asset/images/Post/1551111403.jpg', '6', '3', '2019-02-25 10:16:43', '2019-02-26 14:31:02'),
(4, 'অর্থনীতি', 'শেয়ারবাজার', 'ডলারের কাছে মান হারাচ্ছে টাকা', 'বছর বছর বাংলাদেশি টাকার মান কমছে। বাংলাদেশ আন্তর্জাতিক বাণিজ্য করে থাকে মার্কিন ডলারে। রক্ষণশীল হিসেবেও আওয়ামী লীগ সরকারের ১০ বছরে সেই ডলারের তুলনায় টাকার মান কমেছে প্রায় ২১ শতাংশ।', 'বছর বছর বাংলাদেশি টাকার মান কমছে। বাংলাদেশ আন্তর্জাতিক বাণিজ্য করে থাকে মার্কিন ডলারে। রক্ষণশীল হিসেবেও আওয়ামী লীগ সরকারের ১০ বছরে সেই ডলারের তুলনায় টাকার মান কমেছে প্রায় ২১ শতাংশ।  অর্থাৎ ১০ বছর আগে যে জিনিস কেনা যেত ১০০ টাকায়, বর্তমানে তা কিনতে হচ্ছে ১২১ টাকায়। এটি সরকারি হিসাবের তথ্য। বেসরকারি হিসাবে এই সময়ে টাকার মূল্যমান আরও বেশি অর্থাৎ ২৫ শতাংশ কমেছে। আর, এর প্রভাবে লেনদেনের ভারসাম্য এবং চলতি হিসাব নেতিবাচক হয়ে পড়েছে। কমে গেছে বৈদেশিক মুদ্রার রিজার্ভও।  Eprothom Aloবাংলাদেশ ব্যাংকের ২০০৯ সালের ফেব্রুয়ারি থেকে এ বছরের ফেব্রুয়ারি পর্যন্ত মুদ্রা বিনিময় হারের তথ্য-উপাত্ত বিশ্লেষণে এ তথ্য মিলেছে।', 'backend_asset/images/Post/1551122272.jpg', '56', '1', '2019-02-25 13:17:52', '2019-03-01 07:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE `setup` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup`
--

INSERT INTO `setup` (`id`, `company_name`, `company_title`, `phone`, `email`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(4, 'Prothom Alo', 'ProthomAlo', '018', 'prothomalo@gmail.com', 'Dhanmondi', 'backend_asset/images/setup/1550954853.png', '2019-02-22 12:22:34', '2019-02-23 14:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_name`, `sub_category_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'বাংলাদেশ', 'নির্বাচন', 'নির্বাচন', 'Active', '2019-02-23 14:40:32', '2019-02-23 14:40:32'),
(6, 'বাংলাদেশ', 'বিভাগ', 'বিভাগ', 'Active', '2019-02-23 14:41:49', '2019-02-23 14:41:49'),
(7, 'বাংলাদেশ', 'রাজনীতি', 'রাজনীতি', 'Active', '2019-02-23 14:43:02', '2019-02-23 14:43:02'),
(8, 'আন্তর্জাতিক', 'আমেরিকা', 'আমেরিকা', 'Active', '2019-02-23 14:44:16', '2019-02-23 14:44:16'),
(9, 'আন্তর্জাতিক', 'যুক্তরাজ্য', 'যুক্তরাজ্য', 'Active', '2019-02-23 14:44:47', '2019-02-23 14:44:47'),
(10, 'আন্তর্জাতিক', 'কানাডা', 'কানাডা', 'Active', '2019-02-23 14:45:13', '2019-02-23 14:45:13'),
(11, 'অর্থনীতি', 'শেয়ারবাজার', 'শেয়ারবাজার', 'Active', '2019-02-23 14:45:38', '2019-02-23 14:45:38'),
(12, 'অর্থনীতি', 'বাণিজ্য সংবাদ', 'বাণিজ্য সংবাদ', 'Active', '2019-02-23 14:46:15', '2019-02-23 14:46:15'),
(13, 'অর্থনীতি', 'পোশাক শিল্প', 'পোশাক শিল্প', 'Active', '2019-02-23 14:46:34', '2019-02-23 14:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shakil Ahmmed', 'shakilfci461@gmail.com', NULL, '$2y$10$fuIPvoChGnjKqXk2mpN5fe4J/klh1CSJe3W01XBNXe.cEwFXuqR7.', 'N6MyxS1QKjcAV91Eq9C5W49NJaOoItQ8v6tPGcAqsqBnskJSo5nJTS3aA3f0', '2019-02-25 12:04:00', '2019-02-25 12:04:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup`
--
ALTER TABLE `setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup`
--
ALTER TABLE `setup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
