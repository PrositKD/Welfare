-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 11:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welfare_association`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `apartment_number` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `building_id`, `apartment_number`, `owner_name`, `mobile_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'A1', 'Zaman Khan', '01524040971', 1, '2024-10-22 23:25:06', '2024-10-22 23:25:06'),
(2, 1, 'A8', 'Kamruzzaman', '01925040975', 1, '2024-10-22 23:25:22', '2024-10-22 23:25:22'),
(3, 1, 'B1', 'Arup', '01925040501', 1, '2024-10-28 03:23:51', '2024-10-28 03:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `road_id` bigint(20) NOT NULL,
  `total_apartment` int(11) NOT NULL DEFAULT 0,
  `contact_person` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `road_id`, `total_apartment`, `contact_person`, `mobile_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SARE Haque Heritage', 13, 3, 'Kamruzzaman', '01928050904', 1, '2024-10-22 23:24:19', '2024-10-28 03:23:51'),
(2, 'Jannat Square', 1, 0, 'Bappa Sutradhar', '01925040501', 1, '2024-10-28 04:17:03', '2024-10-28 04:29:50'),
(3, 'Modila Vila', 12, 0, 'Rakib', '01928040504', 1, '2024-10-28 04:23:18', '2024-10-28 04:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1730106507),
('c525a5357e97fef8d3db25841c86da1a:timer', 'i:1730106507;', 1730106507),
('eef95f658febcee12b41ea8ec1bace29', 'i:2;', 1730972881),
('eef95f658febcee12b41ea8ec1bace29:timer', 'i:1730972881;', 1730972881);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"f6cb5396-706a-48bb-ac1b-b48f53c78dba\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"7f0c03e1-81ef-4750-9213-b2af0a107c98\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1729426736, 1729426736),
(2, 'default', '{\"uuid\":\"73216ff9-ecf0-4889-b905-b73aafd3ecfb\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:3;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"55f2bd24-e8de-4ed6-9285-3a42abf7d126\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1729427356, 1729427356),
(3, 'default', '{\"uuid\":\"3d5f689c-3e9b-409f-ab0d-be2f9d244b34\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"f5f699f5-3762-4289-b98a-a5e64cc796eb\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1729492298, 1729492298),
(4, 'default', '{\"uuid\":\"5635cad1-1e3f-46e9-93ed-4ceb5463e070\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:5;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"be40f3e6-7076-4bf7-bbff-cce00c243a63\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1729492396, 1729492396),
(5, 'default', '{\"uuid\":\"5d28a16b-89ad-497a-8483-ac149691a31c\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"6b89bd8b-8fa8-4c82-9fb0-98367cb9aba8\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1729492434, 1729492434),
(6, 'default', '{\"uuid\":\"28d18de4-38fd-41a4-92bb-68f9bb0b5d82\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:9;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"5ab852a4-a3c8-483a-8e28-5716237e442c\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1729661263, 1729661263),
(7, 'default', '{\"uuid\":\"29e5519c-1965-467e-9390-1805264ac72c\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:10;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"5d296ab2-b2e4-4c62-ac9e-16e3834256e7\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1730108858, 1730108858),
(8, 'default', '{\"uuid\":\"00a9bc8e-cef4-479b-8f12-7e7f5662ac1d\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:11;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"c85afbe5-1b45-447e-ac32-a0e92aa34f1d\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1730108889, 1730108889),
(9, 'default', '{\"uuid\":\"5c7185df-0ab0-4cdd-973e-738ed4a054e7\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:13;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"fcbe46c6-2db0-44d5-83f4-a16d12a67752\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1730108938, 1730108938),
(10, 'default', '{\"uuid\":\"3df4debb-7db8-467c-befb-54d87ce109ba\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:15;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"ac810262-e24f-4d04-b817-eeccd7073d0c\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1730114227, 1730114227),
(11, 'default', '{\"uuid\":\"790913fe-96c2-4f2f-92ad-ff8c9727c5fa\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:16;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"15723987-df07-4dd8-a48c-8c213a52f20f\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1730114965, 1730114965),
(12, 'default', '{\"uuid\":\"0024f4b7-cde7-4d36-9ed3-484871f95c68\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:19;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"186de4ec-a64c-42d8-aba2-dce3296f14af\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1730115210, 1730115210),
(13, 'default', '{\"uuid\":\"e26f16c2-fc07-4fb9-aedd-1394f12820f0\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:31;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"86350648-8dda-4c51-b37d-11753588c6b5\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1730116037, 1730116037),
(14, 'default', '{\"uuid\":\"07245fd8-4e23-4cc4-b4ee-f55c258c67b3\",\"displayName\":\"App\\\\Notifications\\\\EmployeeCreateNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:37;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\EmployeeCreateNotification\\\":2:{s:60:\\\"\\u0000App\\\\Notifications\\\\EmployeeCreateNotification\\u0000employeeCreate\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:37;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"3f15b03c-b451-438f-93e4-6634e8d9e17f\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1730118287, 1730118287);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_16_044941_add_two_factor_columns_to_users_table', 1),
(5, '2024_10_16_045037_create_personal_access_tokens_table', 1),
(6, '2024_10_20_083323_create_buildings_table', 1),
(7, '2024_10_20_083326_create_apartments_table', 1),
(8, '2024_10_20_083338_create_payments_table', 1),
(11, '2024_10_28_095100_create_roads_table', 2),
(12, '2024_10_28_095101_create_road_staff_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roads`
--

CREATE TABLE `roads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `road_no` int(11) NOT NULL,
  `block` varchar(50) DEFAULT NULL,
  `is_assign` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roads`
--

INSERT INTO `roads` (`id`, `road_no`, `block`, `is_assign`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(2, 1, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(3, 1, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(4, 1, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(5, 2, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(6, 2, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(7, 2, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(8, 2, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(9, 3, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(10, 3, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(11, 3, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(12, 3, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(13, 4, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(14, 4, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(15, 4, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(16, 4, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(17, 5, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(18, 5, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(19, 5, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(20, 5, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(21, 6, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(22, 6, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(23, 6, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(24, 6, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(25, 7, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(26, 7, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(27, 7, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(28, 7, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(29, 8, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(30, 8, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(31, 8, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(32, 8, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(33, 9, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(34, 9, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(35, 9, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(36, 9, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(37, 10, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(38, 10, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(39, 10, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(40, 10, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(41, 11, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(42, 11, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(43, 11, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(44, 11, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(45, 12, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(46, 12, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(47, 12, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(48, 12, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(49, 13, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(50, 13, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(51, 13, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(52, 13, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(53, 14, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(54, 14, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(55, 14, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(56, 14, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(57, 15, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(58, 15, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(59, 15, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(60, 15, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(61, 16, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(62, 16, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(63, 16, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(64, 16, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(65, 17, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(66, 17, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(67, 17, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(68, 17, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(69, 18, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(70, 18, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(71, 18, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(72, 18, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(73, 19, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(74, 19, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(75, 19, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(76, 19, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(77, 20, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(78, 20, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(79, 20, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(80, 20, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(81, 21, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(82, 21, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(83, 21, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(84, 21, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(85, 22, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(86, 22, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(87, 22, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(88, 22, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(89, 23, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(90, 23, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(91, 23, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(92, 23, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(93, 24, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(94, 24, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(95, 24, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(96, 24, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(97, 25, 'A', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(98, 25, 'B', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(99, 25, 'C', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54'),
(100, 25, 'D', 0, '2024-10-28 06:02:54', '2024-10-28 06:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `road_staff`
--

CREATE TABLE `road_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `road_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `road_staff`
--

INSERT INTO `road_staff` (`id`, `staff_id`, `road_id`, `created_at`, `updated_at`) VALUES
(13, 37, 1, '2024-10-28 06:24:47', '2024-10-28 06:24:47'),
(14, 37, 2, '2024-10-28 06:24:47', '2024-10-28 06:24:47'),
(15, 37, 3, '2024-10-28 06:24:47', '2024-10-28 06:24:47'),
(16, 37, 4, '2024-10-28 06:24:47', '2024-10-28 06:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6mmSa9bm1sZmauT6O6WtqSXrEkF5nNbcKK2Dc3Et', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTU1QNjVqaDRralhjTnJQSkdudGtxazNhN21qaGk3NWYxZHB5S2xpTSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU0OiJodHRwOi8vbG9jYWxob3N0L3dlbGZhcmVfYXNzb2NpYXRpb24vcHVibGljL3N0YWZmL2xpc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJHRqUVNlaWdFSzlEbjFGcEpjYWdvTS5FNVhJQkw2UHM3NTBTT3VSbmpkS2l6SlVjTktMYmptIjt9', 1730976086);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `status` enum('active','block','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$tjQSeigEK9Dn1FpJcagoM.E5XIBL6Ps750SOuRnjdKizJUcNKLbjm', NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-10-20 06:16:28', '2024-10-20 06:16:28'),
(37, 'Miraz', 'miraz@gmail.com', 'user', NULL, '$2y$12$WOPVKcnk0CPvuwKeFNAnYOw7eS03MHEGMnx1aJAKnun2x5OF59X4W', NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-10-28 06:24:47', '2024-11-07 03:49:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartments_building_id_foreign` (`building_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_apartment_id_foreign` (`apartment_id`),
  ADD KEY `payments_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roads`
--
ALTER TABLE `roads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `road_staff`
--
ALTER TABLE `road_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `road_staff_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roads`
--
ALTER TABLE `roads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `road_staff`
--
ALTER TABLE `road_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `road_staff`
--
ALTER TABLE `road_staff`
  ADD CONSTRAINT `road_staff_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
