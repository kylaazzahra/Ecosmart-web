-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ecosmart_db
CREATE DATABASE IF NOT EXISTS `ecosmart_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ecosmart_db`;

-- Dumping structure for table ecosmart_db.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.cache: ~0 rows (approximately)

-- Dumping structure for table ecosmart_db.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.cache_locks: ~0 rows (approximately)

-- Dumping structure for table ecosmart_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table ecosmart_db.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.jobs: ~0 rows (approximately)

-- Dumping structure for table ecosmart_db.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.job_batches: ~0 rows (approximately)

-- Dumping structure for table ecosmart_db.klasifikasis
CREATE TABLE IF NOT EXISTS `klasifikasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.klasifikasis: ~5 rows (approximately)
INSERT INTO `klasifikasis` (`id`, `itemid`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 0, 'kardus', 'Kardus bekas? Jangan langsung dibuang, ngab! Kardus bisa disulap jadi rak buku kece, tempat penyimpanan serbaguna, atau dekorasi estetik buat kamar. Dikit kreativitas, hasilnya luar biasa! Yuk, manfaatin kardus lo!', '2025-06-06 02:46:26', '2025-06-06 02:46:28'),
	(2, 1, 'Metal / Kaleng', 'Kaleng Metal? Kaleng bekas minuman? Bukan cuma sampah, tapi peluang emas buat bikin tempat pensil industrial vibes, pot kecil nan lucu, atau speaker DIY! Yuk ngab, ubah barang sisa jadi karya luar biasa!', '2025-06-06 02:47:11', '2025-06-06 02:47:11'),
	(3, 2, 'Kertas', 'Kertas Bekas? Nggak cuma bisa dilipat jadi pesawat kertas, cuy! Eh maksudnya ngab 😆 Kertas bekas bisa disulap jadi kerajinan tangan kece, kertas daur ulang handmade, atau bahkan dekorasi origami yang artsy. Asal mau, pasti bisa!', '2025-06-06 02:47:11', '2025-06-06 02:47:11'),
	(4, 3, 'Botol Plastik / Plastik', 'Botol plastik bekas? Jangan buru-buru buang! Dengan sedikit kreativitas, kamu bisa mengubahnya menjadi pot tanaman unik, tempat alat tulis keren, hiasan gantung warna-warni, hingga mainan edukatif untuk anak. Mari berkreasi dan berkarya!', '2025-06-06 02:47:11', '2025-06-06 02:47:11'),
	(5, 4, 'Sampah', 'Sampah? Sampah yang keliatannya nggak berguna, ternyata bisa banget diolah jadi pupuk kompos, eco-brick, atau karya seni ramah lingkungan. Tinggal niat, ide, dan aksi! Yuk, peduli bumi dari hal kecil!', '2025-06-06 02:47:11', '2025-06-06 09:09:37');

-- Dumping structure for table ecosmart_db.klasifikasi_histories
CREATE TABLE IF NOT EXISTS `klasifikasi_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hasil` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.klasifikasi_histories: ~0 rows (approximately)

-- Dumping structure for table ecosmart_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_06_05_113916_create_personal_access_tokens_table', 2),
	(6, '2025_06_06_010918_create_klasifikasi_histories_table', 3),
	(8, '2025_06_06_023814_create_klasifikasis_table', 4),
	(9, '0001_01_01_000000_create_users_table', 5);

-- Dumping structure for table ecosmart_db.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table ecosmart_db.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.sessions: ~0 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('GQCCQ0qskvur6AHfloOH6MKkrjeKjeDsqZBSP49m', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT0pPSndMcEJ4UVFsSUNOVDhXY3F0Y0lMY1U0ZU9HZnNjMnp3SlZqWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1749227377);

-- Dumping structure for table ecosmart_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecosmart_db.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', '2025-06-06 07:42:10', '$2y$12$nQMvqZGu46hb9hjVtuxan.WISA2ebog0jAYZPspwK8IyEDxmxCc6i', 'admin', NULL, '2025-06-06 07:42:10', '2025-06-06 08:41:34'),
	(3, 'malik', 'malik@gmail.com', '2025-06-06 08:49:32', '$2y$12$ll883CnI7PinV0.osruqSe.dLZnqY2UAbAwt9MBZ5ExgGZKSmzXsi', 'user', NULL, '2025-06-06 08:49:32', '2025-06-06 08:49:32'),
	(4, 'malikadmin', 'malikadmin@gmail.com', '2025-06-06 08:49:47', '$2y$12$VhiBg7r.3HnHPhspmrzQpefDu4d9Bf5srM7sDKdLtYcIfv1gb2BlS', 'admin', NULL, '2025-06-06 08:49:47', '2025-06-06 08:49:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
