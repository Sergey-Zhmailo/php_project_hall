-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2019 г., 17:26
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project_hall`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `categoty_name` varchar(250) NOT NULL,
  `category_price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `categoty_name`, `category_price`) VALUES
(1, 'A', '289'),
(2, 'B', '250'),
(3, 'C', '230'),
(4, 'D', '195');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`) VALUES
(9, 10),
(13, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `place_id`) VALUES
(14, 9, 2787),
(15, 9, 2788),
(21, 13, 2761);

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `place_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`place_id`, `place_name`, `zone_id`, `category_id`, `place_status`) VALUES
(2761, '1', 1, 1, 0),
(2762, '2', 1, 1, 1),
(2763, '3', 1, 1, 1),
(2764, '4', 1, 1, 1),
(2765, '5', 1, 1, 1),
(2766, '6', 1, 1, 1),
(2767, '7', 1, 1, 1),
(2768, '8', 1, 1, 1),
(2769, '9', 1, 1, 1),
(2770, '10', 1, 1, 1),
(2771, '11', 1, 1, 1),
(2772, '12', 1, 1, 1),
(2773, '13', 1, 1, 1),
(2774, '14', 1, 1, 1),
(2775, '15', 1, 1, 1),
(2776, '16', 1, 1, 1),
(2777, '17', 1, 1, 1),
(2778, '18', 1, 1, 1),
(2779, '19', 1, 1, 1),
(2780, '20', 1, 1, 1),
(2781, '21', 1, 1, 1),
(2782, '22', 1, 1, 1),
(2783, '23', 1, 1, 1),
(2784, '24', 1, 1, 1),
(2785, '25', 1, 1, 1),
(2786, '26', 1, 1, 1),
(2787, '1', 2, 2, 0),
(2788, '2', 2, 2, 0),
(2789, '3', 2, 2, 1),
(2790, '4', 2, 2, 1),
(2791, '5', 2, 2, 1),
(2792, '6', 2, 2, 1),
(2793, '7', 2, 2, 1),
(2794, '8', 2, 2, 1),
(2795, '9', 2, 2, 1),
(2796, '10', 2, 2, 1),
(2797, '11', 2, 2, 1),
(2798, '12', 2, 2, 1),
(2799, '13', 2, 2, 1),
(2800, '14', 2, 2, 1),
(2801, '15', 2, 2, 1),
(2802, '16', 2, 2, 1),
(2803, '17', 2, 2, 1),
(2804, '18', 2, 2, 1),
(2805, '19', 2, 2, 1),
(2806, '20', 2, 2, 1),
(2807, '21', 2, 2, 1),
(2808, '22', 2, 2, 1),
(2809, '23', 2, 2, 1),
(2810, '24', 2, 2, 1),
(2811, '25', 2, 2, 1),
(2812, '26', 2, 2, 1),
(2813, '1', 3, 3, 1),
(2814, '2', 3, 3, 1),
(2815, '3', 3, 3, 1),
(2816, '4', 3, 3, 1),
(2817, '5', 3, 3, 1),
(2818, '6', 3, 3, 1),
(2819, '7', 3, 3, 1),
(2820, '8', 3, 3, 1),
(2821, '9', 3, 3, 1),
(2822, '10', 3, 3, 1),
(2823, '11', 3, 3, 1),
(2824, '12', 3, 3, 1),
(2825, '13', 3, 3, 1),
(2826, '14', 3, 3, 1),
(2827, '15', 3, 3, 1),
(2828, '16', 3, 3, 1),
(2829, '17', 3, 3, 1),
(2830, '18', 3, 3, 1),
(2831, '19', 3, 3, 1),
(2832, '20', 3, 3, 1),
(2833, '21', 3, 3, 1),
(2834, '22', 3, 3, 1),
(2835, '23', 3, 3, 1),
(2836, '24', 3, 3, 1),
(2837, '25', 3, 3, 1),
(2838, '26', 3, 3, 1),
(2839, '27', 3, 3, 1),
(2840, '28', 3, 3, 1),
(2841, '29', 3, 3, 1),
(2842, '30', 3, 3, 1),
(2843, '31', 3, 3, 1),
(2844, '32', 3, 3, 1),
(2845, '33', 3, 3, 1),
(2846, '34', 3, 3, 1),
(2847, '35', 3, 3, 1),
(2848, '36', 3, 3, 1),
(2849, '37', 3, 3, 1),
(2850, '38', 3, 3, 1),
(2851, '39', 3, 3, 1),
(2852, '1', 4, 4, 1),
(2853, '2', 4, 4, 1),
(2854, '3', 4, 4, 1),
(2855, '4', 4, 4, 1),
(2856, '5', 4, 4, 1),
(2857, '6', 4, 4, 1),
(2858, '7', 4, 4, 1),
(2859, '8', 4, 4, 1),
(2860, '9', 4, 4, 1),
(2861, '10', 4, 4, 1),
(2862, '11', 4, 4, 1),
(2863, '12', 4, 4, 1),
(2864, '13', 4, 4, 1),
(2865, '14', 4, 4, 1),
(2866, '15', 4, 4, 1),
(2867, '16', 4, 4, 1),
(2868, '17', 4, 4, 1),
(2869, '18', 4, 4, 1),
(2870, '19', 4, 4, 1),
(2871, '20', 4, 4, 1),
(2872, '1', 5, 4, 1),
(2873, '2', 5, 4, 1),
(2874, '3', 5, 4, 1),
(2875, '4', 5, 4, 1),
(2876, '5', 5, 4, 1),
(2877, '6', 5, 4, 1),
(2878, '7', 5, 4, 1),
(2879, '8', 5, 4, 1),
(2880, '9', 5, 4, 1),
(2881, '10', 5, 4, 1),
(2882, '11', 5, 4, 1),
(2883, '12', 5, 4, 1),
(2884, '13', 5, 4, 1),
(2885, '14', 5, 4, 1),
(2886, '15', 5, 4, 1),
(2887, '16', 5, 4, 1),
(2888, '17', 5, 4, 1),
(2889, '18', 5, 4, 1),
(2890, '19', 5, 4, 1),
(2891, '20', 5, 4, 1),
(2892, '1', 6, 4, 1),
(2893, '2', 6, 4, 1),
(2894, '3', 6, 4, 1),
(2895, '4', 6, 4, 1),
(2896, '5', 6, 4, 1),
(2897, '6', 6, 4, 1),
(2898, '7', 6, 4, 1),
(2899, '8', 6, 4, 1),
(2900, '9', 6, 4, 1),
(2901, '10', 6, 4, 1),
(2902, '11', 6, 4, 1),
(2903, '12', 6, 4, 1),
(2904, '13', 6, 4, 1),
(2905, '14', 6, 4, 1),
(2906, '15', 6, 4, 1),
(2907, '16', 6, 4, 1),
(2908, '17', 6, 4, 1),
(2909, '18', 6, 4, 1),
(2910, '19', 6, 4, 1),
(2911, '20', 6, 4, 1),
(2912, '21', 6, 4, 1),
(2913, '22', 6, 4, 1),
(2914, '23', 6, 4, 1),
(2915, '24', 6, 4, 1),
(2916, '25', 6, 4, 1),
(2917, '26', 6, 4, 1),
(2918, '27', 6, 4, 1),
(2919, '28', 6, 4, 1),
(2920, '29', 6, 4, 1),
(2921, '30', 6, 4, 1),
(2922, '31', 6, 4, 1),
(2923, '32', 6, 4, 1),
(2924, '33', 6, 4, 1),
(2925, '34', 6, 4, 1),
(2926, '35', 6, 4, 1),
(2927, '36', 6, 4, 1),
(2928, '37', 6, 4, 1),
(2929, '38', 6, 4, 1),
(2930, '39', 6, 4, 1),
(2931, '40', 6, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'user1', 'user1@mail.com', '123456'),
(2, 'user2', 'user2@mail.com', '123456'),
(3, 'user3', 'Shanna@melissa.tv', '123456'),
(4, 'user4', '0', '123456'),
(5, '1', '1', '1'),
(6, 'user6', 'user6@mail.com', '$2y$10$PH9Y6JH9Rof2JGD4DJCZ5ebbb6xvySTskWO2P/PaDkZwuN25RXiW.'),
(7, 'user7', 'user7@mail.com', '$2y$10$HAuu12X8t5raWE1XdZ/8z.4yyHVbqTQnyX8g49ImW8mf2OfvSrMzy'),
(8, 'user8', 'user8@mail.com', '$2y$10$vKuC9RA7jsE73KZ6WlkJVOgcPpvQrQLS9wPGn9tm1S9/hmmUGX6xO'),
(9, 'user9', 'user9@mail.com', '$2y$10$SwM/MEBp63RjsadEsGaZTeLL4IKatbDb3o/2rIhIT0SgksgzjqmWu'),
(10, 'user10', 'user10@mail.com', '$2y$10$BYlf78MCG3tXfmsTEtv/2u021U.C79v4rCk10ZpGrBXEqUq3lbGP6'),
(11, 'user11', 'user11@mail.com', '$2y$10$b4/9hBB1vZHA.bIj3.aHweeRPmXCD7ZdL3/Q9QY12nyLj7geDckzK');

-- --------------------------------------------------------

--
-- Структура таблицы `zones`
--

CREATE TABLE `zones` (
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(250) NOT NULL,
  `category_id` varchar(250) NOT NULL,
  `places_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_name`, `category_id`, `places_quantity`) VALUES
(1, 'Партер 1', '1', 26),
(2, 'Партер 2', '2', 26),
(3, 'Партер 3', '3', 39),
(4, 'Балкон 1', '4', 20),
(5, 'Балкон 2', '4', 20),
(6, 'Балкон 3', '4', 40);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2932;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
