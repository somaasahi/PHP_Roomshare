-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 12 月 07 日 17:10
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `room`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(32) NOT NULL,
  `post_id` int(32) NOT NULL,
  `post_user_id` int(32) NOT NULL,
  `view_user_id` int(32) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`id`, `post_id`, `post_user_id`, `view_user_id`, `content`, `created_at`) VALUES
(46, 51, 16, 13, 'test', '2021-12-04 01:56:39'),
(47, 42, 16, 13, 'a', '2021-12-04 02:19:21'),
(48, 42, 16, 13, 'd', '2021-12-04 02:22:08'),
(49, 42, 16, 13, 'd', '2021-12-04 02:23:24'),
(50, 42, 16, 13, 'd', '2021-12-04 02:23:34'),
(51, 42, 16, 13, 'd', '2021-12-04 02:23:44'),
(52, 42, 16, 13, 'd', '2021-12-04 02:23:50'),
(53, 51, 16, 13, 'm', '2021-12-04 13:10:50'),
(54, 52, 16, 13, 'test', '2021-12-04 14:10:31'),
(55, 52, 16, 13, 'j', '2021-12-04 14:14:59'),
(56, 52, 16, 13, 'test', '2021-12-04 14:27:44'),
(57, 52, 16, 13, 'test', '2021-12-04 14:27:50'),
(58, 52, 16, 13, 'test', '2021-12-04 14:49:46'),
(59, 52, 16, 13, 'test', '2021-12-04 14:53:37'),
(60, 52, 16, 13, 'test', '2021-12-04 15:14:20'),
(61, 52, 16, 13, 'test\r\ntest', '2021-12-05 19:03:39'),
(62, 54, 16, 13, 'test', '2021-12-05 19:37:41'),
(63, 51, 16, 13, 'test', '2021-12-06 00:55:45'),
(64, 58, 16, 13, 'd', '2021-12-07 18:20:44'),
(65, 58, 16, 13, 'tewst', '2021-12-07 19:03:27'),
(66, 60, 32, 13, '家が欲しいです！', '2021-12-08 00:20:44'),
(67, 60, 32, 13, '家が欲しいです！', '2021-12-08 00:21:14');

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `id` int(32) NOT NULL,
  `post_id` int(32) NOT NULL,
  `view_user_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `view_user_id`) VALUES
(40, 18, 13),
(41, 26, 13),
(50, 47, 13),
(54, 44, 13),
(55, 48, 13),
(60, 50, 13),
(65, 52, 17),
(66, 45, 13),
(69, 58, 13),
(70, 60, 13);

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id` int(32) NOT NULL,
  `post_user_id` int(32) NOT NULL,
  `area_id` int(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `save_path` varchar(255) NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `post_user_id`, `area_id`, `address`, `title`, `content`, `save_path`, `del_flg`, `created_at`, `updated_at`) VALUES
(42, 16, 1, '北海道新宿区大久保3丁目2-1-2パワフルマンション401', '大都会ド真ん中で一人暮らしをしてみましょう！', '東京周辺で賃貸マンションをお探しなら、巣鴨は大変お勧めです。巣鴨駅はJR山手線と三田線が利用できる\r\nため、東京の主要地域におおよそ30分程度で着くことが出来ます。また、新宿や池袋にいたっては、\r\n15分以内に着きます。地方から東京に来る方であれば、まだまだ生活に慣れないことも多いと思うので、\r\nなるべくなら、乗り換えが少なくすむ山手線沿線に住むのがおすすめです。\r\nさらに、巣鴨の賃貸マンションは比較的に安く、且つ治安も良い場所です。家賃が安いと治安も悪いのでは\r\nというイメージがもたれがちですが、巣鴨ではそのようなことはありませんので、女性には特におすすめです。\r\nまた、巣鴨周辺は立地条件がよいのも特徴です。JR巣鴨駅の近くは非常に栄えていますので、スーパーや\r\nコンビニも多くあり、深夜の買い物にも困りません。また居酒屋や飲食店も多く、暮らしに便利です。\r\n駅には駐輪場も設置されており、巣鴨の隣駅の西巣鴨の賃貸マンションに住んでいても、自転車で5分程度で\r\n巣鴨駅に着きます。', 'imgs/20211202162634ダウンロード (2).jpeg', 1, '2021-12-03 00:31:17', '2021-12-07 14:20:47'),
(45, 17, 1, '北海道鳥取市烏山5-1-2ビューナイス201', '海しかない田舎の高級部屋でのんびり暮らしましょう！', '東京周辺で賃貸マンションをお探しなら、巣鴨は大変お勧めです。巣鴨駅はJR山手線と三田線が利用できる\r\nため、東京の主要地域におおよそ30分程度で着くことが出来ます。また、新宿や池袋にいたっては、\r\n15分以内に着きます。地方から東京に来る方であれば、まだまだ生活に慣れないことも多いと思うので、\r\nなるべくなら、乗り換えが少なくすむ山手線沿線に住むのがおすすめです。\r\nさらに、巣鴨の賃貸マンションは比較的に安く、且つ治安も良い場所です。家賃が安いと治安も悪いのでは\r\nというイメージがもたれがちですが、巣鴨ではそのようなことはありませんので、女性には特におすすめです。\r\nまた、巣鴨周辺は立地条件がよいのも特徴です。JR巣鴨駅の近くは非常に栄えていますので、スーパーや\r\nコンビニも多くあり、深夜の買い物にも困りません。また居酒屋や飲食店も多く、暮らしに便利です。\r\n駅には駐輪場も設置されており、巣鴨の隣駅の西巣鴨の賃貸マンションに住んでいても、自転車で5分程度で\r\n巣鴨駅に着きます。', 'imgs/20211202162407ダウンロード (6).jpeg', 0, '2021-12-03 01:24:10', '2021-12-07 14:12:34'),
(46, 17, 1, '北海道横須賀市宝町3-2-2ナイスハウス393', 'ベッドタウンで優雅に暮らしませんか。繁華街も近いです！', '東京周辺で賃貸マンションをお探しなら、巣鴨は大変お勧めです。巣鴨駅はJR山手線と三田線が利用できる\r\nため、東京の主要地域におおよそ30分程度で着くことが出来ます。また、新宿や池袋にいたっては、\r\n15分以内に着きます。地方から東京に来る方であれば、まだまだ生活に慣れないことも多いと思うので、\r\nなるべくなら、乗り換えが少なくすむ山手線沿線に住むのがおすすめです。\r\nさらに、巣鴨の賃貸マンションは比較的に安く、且つ治安も良い場所です。家賃が安いと治安も悪いのでは\r\nというイメージがもたれがちですが、巣鴨ではそのようなことはありませんので、女性には特におすすめです。\r\nまた、巣鴨周辺は立地条件がよいのも特徴です。JR巣鴨駅の近くは非常に栄えていますので、スーパーや\r\nコンビニも多くあり、深夜の買い物にも困りません。また居酒屋や飲食店も多く、暮らしに便利です。\r\n駅には駐輪場も設置されており、巣鴨の隣駅の西巣鴨の賃貸マンションに住んでいても、自転車で5分程度で\r\n巣鴨駅に着きます。', 'imgs/20211202162551ダウンロード (1).jpeg', 0, '2021-12-03 01:25:54', '2021-12-07 14:12:46'),
(48, 17, 1, '北海道博多市天神5-1-3ライジンルーム404', '綺麗な部屋、栄えた街で煌びやかな生活を送ろう！', '東京周辺で賃貸マンションをお探しなら、巣鴨は大変お勧めです。巣鴨駅はJR山手線と三田線が利用できる\r\nため、東京の主要地域におおよそ30分程度で着くことが出来ます。また、新宿や池袋にいたっては、\r\n15分以内に着きます。地方から東京に来る方であれば、まだまだ生活に慣れないことも多いと思うので、\r\nなるべくなら、乗り換えが少なくすむ山手線沿線に住むのがおすすめです。\r\nさらに、巣鴨の賃貸マンションは比較的に安く、且つ治安も良い場所です。家賃が安いと治安も悪いのでは\r\nというイメージがもたれがちですが、巣鴨ではそのようなことはありませんので、女性には特におすすめです。\r\nまた、巣鴨周辺は立地条件がよいのも特徴です。JR巣鴨駅の近くは非常に栄えていますので、スーパーや\r\nコンビニも多くあり、深夜の買い物にも困りません。また居酒屋や飲食店も多く、暮らしに便利です。\r\n駅には駐輪場も設置されており、巣鴨の隣駅の西巣鴨の賃貸マンションに住んでいても、自転車で5分程度で\r\n巣鴨駅に着きます。', 'imgs/20211202163050ダウンロード (3).jpeg', 0, '2021-12-03 01:30:53', '2021-12-07 14:12:58'),
(49, 16, 1, '北海道横浜市都筑区茅ヶ崎町5-1-1サーバーマンション101', 'ベッドタウンですが近年発展し続けている街です！', '東京周辺で賃貸マンションをお探しなら、巣鴨は大変お勧めです。巣鴨駅はJR山手線と三田線が利用できる\r\nため、東京の主要地域におおよそ30分程度で着くことが出来ます。また、新宿や池袋にいたっては、\r\n15分以内に着きます。地方から東京に来る方であれば、まだまだ生活に慣れないことも多いと思うので、\r\nなるべくなら、乗り換えが少なくすむ山手線沿線に住むのがおすすめです。\r\nさらに、巣鴨の賃貸マンションは比較的に安く、且つ治安も良い場所です。家賃が安いと治安も悪いのでは\r\nというイメージがもたれがちですが、巣鴨ではそのようなことはありませんので、女性には特におすすめです。\r\nまた、巣鴨周辺は立地条件がよいのも特徴です。JR巣鴨駅の近くは非常に栄えていますので、スーパーや\r\nコンビニも多くあり、深夜の買い物にも困りません。また居酒屋や飲食店も多く、暮らしに便利です。\r\n駅には駐輪場も設置されており、巣鴨の隣駅の西巣鴨の賃貸マンションに住んでいても、自転車で5分程度で\r\n巣鴨駅に着きます。', 'imgs/20211203062735ダウンロード.jpeg', 0, '2021-12-03 15:32:05', '2021-12-07 14:13:10'),
(51, 16, 1, '北海道宇都宮市新居薬師町5-3-1ギョーザイオン39', '田舎で暮らしませんか？落ち着いていてリッラクスできます。', 'どんな業務でも、自分なりに課題をもって前向きに取り組むことが得意です。常により良いものを作り上げていこうと思っているからです。現職ではリラクゼーションサロンでお客様への施術や店舗業務全般を任されてきました。お客様は常に一人ひとり違うので、臨機応変に対応することが求められます。そのため常に反省をしてより満足を与えられるように工夫をこらしてきました。\r\nお店全体に関しても同業種のお店が乱立しているこの世の中では、マーケットの動向をチェックしつつ他店との差別化をはからなければなりません。そのためにはやはり課題を探して修正していく必要がありました。このような経験値は御社でもきっと役立てることだと思います。', 'imgs/20211203165608ダウンロード (7).jpeg', 0, '2021-12-04 01:56:14', '2021-12-07 14:13:19'),
(52, 16, 1, '北海道枚方市那須造3-3-0マルフォイハウス ', ' 大阪市内まで30分！若干田舎ですが綺麗なお部屋です！', '神田でマンションを探す際、まずは神田という街がどのような街であるかを把握するのがよいでしょう。\r\n神田は山手線で東京駅の次の駅です。中央線や銀座線も通っていますので、非常に交通の便がよいです。\r\nオフィス街なので、スーパーなどは少ないですが、そのかわり居酒屋やカラオケなどはかなり沢山あります。\r\nまた、平日はサラリーマンで賑わいますが、土日は閑静です。\r\n神田のマンションは駅周辺にもありますが、徒歩3分以上の場所に比較的多く存在しています。\r\n賃貸しのマンションもありますが、家賃は決して安くありません。\r\n学生さんにはあまり向かない条件の土地ですが、会社のすぐ近くにマンションを買いたい、\r\nマンションを借りたい、という方にはおすすめです。', 'imgs/20211204051009ダウンロード (6).jpeg', 0, '2021-12-04 14:10:12', '2021-12-07 14:13:30'),
(57, 28, 1, '北海道', ' 大阪市内まで30分！若干田舎ですが綺麗なお部屋です！', 's東京周辺で賃貸マンションをお探しなら、巣鴨は大変お勧めです。巣鴨駅はJR山手線と三田線が利用できる\r\nため、東京の主要地域におおよそ30分程度で着くことが出来ます。また、新宿や池袋にいたっては、\r\n15分以内に着きます。地方から東京に来る方であれば、まだまだ生活に慣れないことも多いと思うので、\r\nなるべくなら、乗り換えが少なくすむ山手線沿線に住むのがおすすめです。\r\nさらに、巣鴨の賃貸マンションは比較的に安く、且つ治安も良い場所です。家賃が安いと治安も悪いのでは\r\nというイメージがもたれがちですが、巣鴨ではそのようなことはありませんので、女性には特におすすめです。\r\nまた、巣鴨周辺は立地条件がよいのも特徴です。JR巣鴨駅の近くは非常に栄えていますので、スーパーや\r\nコンビニも多くあり、深夜の買い物にも困りません。また居酒屋や飲食店も多く、暮らしに便利です。\r\n駅には駐輪場も設置されており、巣鴨の隣駅の西巣鴨の賃貸マンションに住んでいても、自転車で5分程度で\r\n巣鴨駅に着きます。', 'imgs/20211205155359ダウンロード (3).jpeg', 0, '2021-12-06 00:54:02', '2021-12-07 14:14:09'),
(58, 16, 1, '北海道札幌市港南町３&minus;１&minus;１グッドシーハウス', '綺麗な海を眺めながら優雅に暮らしませんか', 'ご列席のみなさま，とくに，インドネシアを代表するシンクタンク，CSISのみなさま，本日はすばらしい機会をいただき，ありがとうございます。\r\n\r\n　本年で，わが国とASEANの関係は，40周年を迎えます。節目に当たり，わたくしは，日本外交の来し方をふりかえるとともに，行く末について，ある決意を述べたいと思ってこの地へまいりました。\r\n\r\n　日本の国益とは，万古不易・未来永劫，アジアの海を徹底してオープンなものとし，自由で，平和なものとするところにあります。法の支配が貫徹する，世界・人類の公共財として，保ち続けるところにあります。\r\n\r\n　わが日本は，まさしくこの目的を達するため，20世紀の後半から今日まで，一貫して2つのことに力をそそいでまいりました。それは，海に囲まれ，海によって生き，海の安全を自らの安全と考える，日本という国の地理的必然でありました。時代が移ろうとも，変わりようはないのであります。\r\n', 'imgs/20211207051857ダウンロード (6).jpeg', 0, '2021-12-07 14:19:11', '2021-12-07 14:19:57'),
(59, 16, 1, 'test', 'test', 'test\r\ntest', 'imgs/20211207090442ダウンロード.jpeg', 1, '2021-12-07 18:04:54', '2021-12-07 18:05:09'),
(60, 32, 1, '栃木県栃木市のざハウス', '栃木は田舎で菅井いいところです！', 'テスト', 'imgs/20211207151940images.jpg', 0, '2021-12-08 00:19:43', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `post_users`
--

CREATE TABLE `post_users` (
  `id` int(32) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `post_users`
--

INSERT INTO `post_users` (`id`, `name`, `mail`, `tel`, `password`, `role`, `del_flg`, `created_at`, `updated_at`) VALUES
(8, '管理者', 'admin@gmail.com', '09055550505', '$2y$10$wOLpkCUHbdCOyOecaS.4fuF6dRgdKjyJDzc9baxP/163NJ8vOF5c2', 1, 0, '2021-11-27 14:22:21', '2021-11-27 14:22:36'),
(16, 'test2', 'test@gmail.com', '09000000000', '$2y$10$l3eSYRQdulN5BkxARamteujViNJ4dIcJBw9NZisq0.MM1uNtryBJK', 0, 0, '2021-11-28 17:09:02', '2021-12-07 18:20:20'),
(29, 'test', 'test1@gmail.com', '09011111111', '$2y$10$2okWfssQ8tP4RoQ7ZAoZ6OyWBWNPblttOxM1stYqdTtaZYwtBx5C2', 0, 0, '2021-12-07 14:01:04', NULL),
(30, 'test2', 'test2@gmail.com', '09022222222', '$2y$10$kvRbaoVbRK8epDzYoeHxmuFMlba7Duqo3AdTVlV2O4XPAcRA1tWCq', 0, 0, '2021-12-07 14:01:27', NULL),
(31, 'test3', 'test3@gmail.com', '09033333333', '$2y$10$CnutZPDYpcapZjH7dKEfCeo2xkNxz/bGE9eE06YKqk1R6MVXM8ryO', 0, 0, '2021-12-07 14:01:56', NULL),
(32, '野沢', 'testn@gmail.com', '09000000001', '$2y$10$F/wVwCgllMlQ59wHmHy.6ubJ9d.DnABmoOA.lEeI5vpsmMFqg4Ovu', 0, 0, '2021-12-08 00:18:35', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `view_users`
--

CREATE TABLE `view_users` (
  `id` int(32) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `view_users`
--

INSERT INTO `view_users` (`id`, `name`, `mail`, `tel`, `password`, `del_flg`, `created_at`, `updated_at`) VALUES
(13, 'test', 'test@gmail.com', '09000000000', '$2y$10$kjL5OdXnaDTGdlGA41hdyebfzhAhRFh01Q5Iraif4qh3iCFF7XoKW', 0, '2021-11-28 17:04:43', '2021-12-05 21:42:15'),
(16, 'test1', 'test5@gmail.com', '09011111111', '$2y$10$PfcafvS34KlPbMraWkOQuOlPxVQZ0VKkPy7dqBiU1zX0gf1yexwS2', 1, '2021-11-30 14:54:17', '2021-12-07 14:08:38'),
(17, 'うずまきナルト', 'naruto@gmail.com', '09007210721', '$2y$10$kUp6hgmboG82w3F9jUXxDOmG.FJVgKEtesxOTLICt2I99ywGMhWKu', 0, '2021-12-04 15:25:05', NULL),
(19, '君とプロテイン', 'testp@gmail.com', '09036828962', '$2y$10$kjL5OdXnaDTGdlGA41hdyebfzhAhRFh01Q5Iraif4qh3iCFF7XoKW', 0, '2021-12-05 21:34:58', '2021-12-07 14:09:03');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `post_users`
--
ALTER TABLE `post_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `tel` (`tel`);

--
-- テーブルのインデックス `view_users`
--
ALTER TABLE `view_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`,`tel`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- テーブルの AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- テーブルの AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- テーブルの AUTO_INCREMENT `post_users`
--
ALTER TABLE `post_users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- テーブルの AUTO_INCREMENT `view_users`
--
ALTER TABLE `view_users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
