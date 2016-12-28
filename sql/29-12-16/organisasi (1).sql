-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Des 2016 pada 10.57
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organisasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agendas`
--

CREATE TABLE `agendas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `agenda_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agendas`
--

INSERT INTO `agendas` (`id`, `name`, `body`, `agenda_date`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'New Agenda edit', 'edit content', '2016-12-07 17:00:00', '2016-12-08 03:15:11', 1, '2016-12-09 01:52:48', 1, NULL, NULL),
(2, 'Ini agenda', 'Ini isi Agenda', '2016-12-08 17:00:00', '2016-12-09 01:41:02', 1, NULL, NULL, NULL, NULL),
(3, 'test', 'test again', '2016-12-30 17:00:00', '2016-12-09 01:57:18', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `description` text,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_id` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `description`, `name`, `category_id`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `created_at`, `type_id`, `link`) VALUES
(2, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2016-12-19 05:26:11', 1, 'http://127.0.0.1/organisasi/assets/photos/14714571_1910031032563365_6564674035228082176_n.jpg'),
(3, '<p>a</p>', 'test edit', NULL, 1, NULL, NULL, NULL, NULL, '2016-12-19 05:33:20', 2, 'https://www.youtube.com/embed/Rlq39IC07qA'),
(4, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, '2016-12-21 02:03:19', 1, 'http://127.0.0.1/organisasi/assets/photos/lipupil.jpg'),
(5, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2016-12-21 02:14:29', 1, 'http://127.0.0.1/organisasi/assets/photos/lipupil1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery_categories`
--

INSERT INTO `gallery_categories` (`id`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Workshop edit', '<p>Ini workshop edit</p>', '2016-12-19 05:25:47', 1, '2016-12-19 05:26:42', 1, NULL, NULL),
(2, 'sad', '<p>awd</p>', '2016-12-21 02:03:08', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Dapat mengakses semua fitur'),
(2, 'Moderator', 'Dapat mengakses fitur berita, profil, regulasi, galeri'),
(3, 'Analytics', 'Mengakses halaman dashboard'),
(4, 'content-creator', 'Mengakses fitur berita, agenda, regulasi, galeri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infos`
--

CREATE TABLE `infos` (
  `no` int(11) NOT NULL,
  `website_name` varchar(100) NOT NULL,
  `acronym` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `office_address` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `phone_alt` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `logo_link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `infos`
--

INSERT INTO `infos` (`no`, `website_name`, `acronym`, `description`, `office_address`, `phone`, `phone_alt`, `email`, `postal_code`, `logo_link`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Website Name', 'akrnim', 'des', 'al', '0', '1', 'andrehardika@gmail.com', '68118', 'http://127.0.0.1/organisasi/assets/img/website_logo/ew.jpg', '2016-12-26 23:03:50', 1, '2016-12-26 23:04:18', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `link`, `deskripsi_menu`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Dashboard', 'dashboard', 'Mengakses menu Dashboard sesuai hak akses', '2016-12-23 23:50:16', 1, NULL, NULL, NULL, NULL),
(2, 'Tulis Berita', 'news/create', 'Mengakses halaman untuk membuat berita', '2016-12-23 23:53:29', 1, NULL, NULL, NULL, NULL),
(3, 'Daftar Berita', 'news', 'Mengakses halaman Daftar Berita', '2016-12-23 23:53:59', 1, NULL, NULL, NULL, NULL),
(4, 'Draft', 'news/draft', 'Mengakses halaman Draft Berita', '2016-12-23 23:54:31', 1, NULL, NULL, NULL, NULL),
(5, 'Berkas', 'news/archive', 'Mengaskes halaman berkas berita', '2016-12-23 23:55:03', 1, NULL, NULL, NULL, NULL),
(6, 'Profil Organisasi', 'profile', 'Mengakses halaman profil', '2016-12-23 23:55:23', 1, NULL, NULL, NULL, NULL),
(7, 'Agenda', 'agenda', 'Mengakses halaman agenda', '2016-12-23 23:55:42', 1, NULL, NULL, NULL, NULL),
(8, 'Regulasi', 'regulation', 'Mengakses halaman regulasi', '2016-12-23 23:55:59', 1, NULL, NULL, NULL, NULL),
(9, 'Foto', 'photos', 'Mengakses halaman galeri foto', '2016-12-23 23:56:27', 1, NULL, NULL, NULL, NULL),
(10, 'Video', 'videos', 'Mengakses halaman galeri video', '2016-12-23 23:56:46', 1, NULL, NULL, NULL, NULL),
(11, 'User', 'auth', 'Mengakses halaman daftar pengguna', '2016-12-23 23:58:41', 2, NULL, NULL, NULL, NULL),
(12, 'User Group', 'auth/groups', 'Mengakses halaman daftar grup pengguna', '2016-12-23 23:59:23', 2, NULL, NULL, NULL, NULL),
(13, 'Menu', 'menu', 'Mengakses halaman daftar menu', '2016-12-23 23:59:40', 2, NULL, NULL, NULL, NULL),
(14, 'Privilege', 'privilege', 'Mengakses halaman hak akses grup pengguna', '2016-12-24 00:00:44', 2, NULL, NULL, NULL, NULL),
(15, 'Pengaturan', 'setting', 'Mengakses halaman pengaturan', '2016-12-24 00:01:22', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img_link` varchar(255) DEFAULT NULL,
  `type` enum('active','draft','archive','unactive') NOT NULL,
  `status_headline` enum('0','1') NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `published_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `name`, `body`, `slug`, `img_link`, `type`, `status_headline`, `count`, `published_at`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'News title for publishing', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliena dixit in physicis nec ea ipsa, quae tibi probarentur; Hoc loco tenere se Triarius non potuit. Illum mallem levares, quo optimum atque humanissimum virum, Cn. Audeo dicere, inquit. Duo Reges: constructio interrete. Dolor ergo, id est summum malum, metuetur semper, etiamsi non aderit; Non ego tecum iam ita iocabor, ut isdem his de rebus, cum L.</p>\r\n<p>Scripta sane et multa et polita, sed nescio quo pacto auctoritatem oratio non habet. Et quidem, Cato, hanc totam copiam iam Lucullo nostro notam esse oportebit; Quodcumque in mentem incideret, et quodcumque tamquam occurreret. Quamquam haec quidem praeposita recte et reiecta dicere licebit. Nos paucis ad haec additis finem faciamus aliquando; Utinam quidem dicerent alium alio beatiorem! Iam ruinas videres. Sextilio Rufo, cum is rem ad amicos ita deferret, se esse heredem Q. Ergo hoc quidem apparet, nos ad agendum esse natos. Quasi ego id curem, quid ille aiat aut neget.</p>\r\n<p>Omnes enim iucundum motum, quo sensus hilaretur. Sed plane dicit quod intellegit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Quae animi affectio suum cuique tribuens atque hanc, quam dico. Diodorus, eius auditor, adiungit ad honestatem vacuitatem doloris. Si enim ad populum me vocas, eum. Primum in nostrane potestate est, quid meminerimus? Idem adhuc; Quaesita enim virtus est, non quae relinqueret naturam, sed quae tueretur. Quid ait Aristoteles reliquique Platonis alumni? Quis non odit sordidos, vanos, leves, futtiles? Bonum valitudo: miser morbus.</p>\r\n<p>Proclivi currit oratio. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Mihi, inquam, qui te id ipsum rogavi? Atqui reperies, inquit, in hoc quidem pertinacem;</p>\r\n<p>&nbsp;</p>\r\n<p>Sit sane ista voluptas. Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum. Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? Ergo id est convenienter naturae vivere, a natura discedere. Certe non potest.&nbsp;</p>', 'news-title-for-publishing-1', '15101679_1834395266799449_3600192340859289600_n.jpg', 'active', '0', 21, '2016-12-28', '2016-12-27 23:54:18', 1, '2016-12-28 01:38:42', 1, NULL, NULL),
(2, 'Another news title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliena dixit in physicis nec ea ipsa, quae tibi probarentur; Hoc loco tenere se Triarius non potuit. Illum mallem levares, quo optimum atque humanissimum virum, Cn. Audeo dicere, inquit. Duo Reges: constructio interrete. Dolor ergo, id est summum malum, metuetur semper, etiamsi non aderit; Non ego tecum iam ita iocabor, ut isdem his de rebus, cum L.</p>\r\n<p>Scripta sane et multa et polita, sed nescio quo pacto auctoritatem oratio non habet. Et quidem, Cato, hanc totam copiam iam Lucullo nostro notam esse oportebit; Quodcumque in mentem incideret, et quodcumque tamquam occurreret. Quamquam haec quidem praeposita recte et reiecta dicere licebit. Nos paucis ad haec additis finem faciamus aliquando; Utinam quidem dicerent alium alio beatiorem! Iam ruinas videres. Sextilio Rufo, cum is rem ad amicos ita deferret, se esse heredem Q. Ergo hoc quidem apparet, nos ad agendum esse natos. Quasi ego id curem, quid ille aiat aut neget.</p>\r\n<p>Omnes enim iucundum motum, quo sensus hilaretur. Sed plane dicit quod intellegit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Quae animi affectio suum cuique tribuens atque hanc, quam dico. Diodorus, eius auditor, adiungit ad honestatem vacuitatem doloris. Si enim ad populum me vocas, eum. Primum in nostrane potestate est, quid meminerimus? Idem adhuc; Quaesita enim virtus est, non quae relinqueret naturam, sed quae tueretur. Quid ait Aristoteles reliquique Platonis alumni? Quis non odit sordidos, vanos, leves, futtiles? Bonum valitudo: miser morbus.</p>\r\n<p>Proclivi currit oratio. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Mihi, inquam, qui te id ipsum rogavi? Atqui reperies, inquit, in hoc quidem pertinacem;</p>\r\n<p>&nbsp;</p>\r\n<p>Sit sane ista voluptas. Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum. Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? Ergo id est convenienter naturae vivere, a natura discedere. Certe non potest.&nbsp;</p>', 'another-news-title', '13658511_981456238635880_1491093037_n2.jpg', 'active', '0', 2, '2016-12-30', '2016-12-27 23:54:44', 1, '2016-12-27 23:54:47', 1, NULL, NULL),
(3, 'The news is epic!', '<p><strong>Jember -</strong>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliena dixit in physicis nec ea ipsa, quae tibi probarentur; Hoc loco tenere se Triarius non potuit. Illum mallem levares, quo optimum atque humanissimum virum, Cn. Audeo dicere, inquit. Duo Reges: constructio interrete. Dolor ergo, id est summum malum, metuetur semper, etiamsi non aderit; Non ego tecum iam ita iocabor, ut isdem his de rebus, cum L.</p>\r\n<p>Scripta sane et multa et polita, sed nescio quo pacto auctoritatem oratio non habet. Et quidem, Cato, hanc totam copiam iam Lucullo nostro notam esse oportebit; Quodcumque in mentem incideret, et quodcumque tamquam occurreret. Quamquam haec quidem praeposita recte et reiecta dicere licebit. Nos paucis ad haec additis finem faciamus aliquando; Utinam quidem dicerent alium alio beatiorem! Iam ruinas videres. Sextilio Rufo, cum is rem ad amicos ita deferret, se esse heredem Q. Ergo hoc quidem apparet, nos ad agendum esse natos. Quasi ego id curem, quid ille aiat aut neget.</p>\r\n<p>Omnes enim iucundum motum, quo sensus hilaretur. Sed plane dicit quod intellegit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Quae animi affectio suum cuique tribuens atque hanc, quam dico. Diodorus, eius auditor, adiungit ad honestatem vacuitatem doloris. Si enim ad populum me vocas, eum. Primum in nostrane potestate est, quid meminerimus? Idem adhuc; Quaesita enim virtus est, non quae relinqueret naturam, sed quae tueretur. Quid ait Aristoteles reliquique Platonis alumni? Quis non odit sordidos, vanos, leves, futtiles? Bonum valitudo: miser morbus.</p>\r\n<p>Proclivi currit oratio. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Mihi, inquam, qui te id ipsum rogavi? Atqui reperies, inquit, in hoc quidem pertinacem;</p>\r\n<p>&nbsp;</p>\r\n<p>Sit sane ista voluptas. Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum. Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? Ergo id est convenienter naturae vivere, a natura discedere. Certe non potest.&nbsp;</p>', 'the-news-is-epic', '13886427_761182577354784_134803317120135536_n.jpg', 'unactive', '0', 1, '2016-12-31', '2016-12-27 23:55:18', 1, NULL, NULL, NULL, NULL),
(4, 'Hola this is an awesome article!', '<p><strong>Lorem</strong> ipsum dolor sit amet, consectetur adipiscing elit. Aliena dixit in physicis nec ea ipsa, quae tibi probarentur; Hoc loco tenere se Triarius non potuit. Illum mallem levares, quo optimum atque humanissimum virum, Cn. Audeo dicere, inquit. Duo Reges: constructio interrete. Dolor ergo, id est summum malum, metuetur semper, etiamsi non aderit; Non ego tecum iam ita iocabor, ut isdem his de rebus, cum L.</p>\r\n<p>Scripta sane et multa et polita, sed nescio quo pacto auctoritatem oratio non habet. Et quidem, Cato, hanc totam copiam iam Lucullo nostro notam esse oportebit; Quodcumque in mentem incideret, et quodcumque tamquam occurreret. Quamquam haec quidem praeposita recte et reiecta dicere licebit. Nos paucis ad haec additis finem faciamus aliquando; Utinam quidem dicerent alium alio beatiorem! Iam ruinas videres. Sextilio Rufo, cum is rem ad amicos ita deferret, se esse heredem Q. Ergo hoc quidem apparet, nos ad agendum esse natos. Quasi ego id curem, quid ille aiat aut neget.</p>\r\n<p>Omnes enim iucundum motum, quo sensus hilaretur. Sed plane dicit quod intellegit. Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. Quae animi affectio suum cuique tribuens atque hanc, quam dico. Diodorus, eius auditor, adiungit ad honestatem vacuitatem doloris. Si enim ad populum me vocas, eum. Primum in nostrane potestate est, quid meminerimus? Idem adhuc; Quaesita enim virtus est, non quae relinqueret naturam, sed quae tueretur. Quid ait Aristoteles reliquique Platonis alumni? Quis non odit sordidos, vanos, leves, futtiles? Bonum valitudo: miser morbus.</p>\r\n<p>Proclivi currit oratio. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Mihi, inquam, qui te id ipsum rogavi? Atqui reperies, inquit, in hoc quidem pertinacem;</p>\r\n<p>&nbsp;</p>\r\n<p>Sit sane ista voluptas. Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum. Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? Ergo id est convenienter naturae vivere, a natura discedere. Certe non potest.&nbsp;</p>', 'hola-this-is-an-awesome-article', '13902739_763620783777630_6428913875350940020_n.jpg', 'active', '0', 1, '2016-12-28', '2016-12-27 23:56:12', 1, '2016-12-27 23:56:21', 1, NULL, NULL),
(5, 'This is draft example', '', 'this-is-draft-example', NULL, 'draft', '0', 0, '0000-00-00', '2016-12-27 23:57:03', 1, NULL, NULL, NULL, NULL),
(6, 'Another draft example', '<p>Unfinished content</p>', 'another-draft-example', '12341234_639836199489476_2609214437683738355_n2.png', 'draft', '0', 0, '0000-00-00', '2016-12-27 23:58:41', 1, NULL, NULL, NULL, NULL),
(7, 'This is for archive', '', 'this-is-for-archive', NULL, 'archive', '0', 0, '2016-12-28', '2016-12-27 23:59:21', 1, '2016-12-27 23:59:25', 1, NULL, NULL),
(8, 'Same news''s title is no problemo :)', '<p>Same content</p>', 'same-newss-title-is-no-problemo-2', '14448274_569699539882748_5078793841062969344_n.jpg', 'active', '0', 0, '2016-12-28', '2016-12-28 00:01:54', 1, '2016-12-28 00:02:12', 1, NULL, NULL),
(9, 'Same news''s title is no problemo :)', '<p>Another content</p>', 'same-newss-title-is-no-problemo-1', '13734373_155904168166376_1749453037_n.jpg', 'active', '0', 3, '2016-12-28', '2016-12-28 00:01:58', 1, '2016-12-28 00:04:37', 1, NULL, NULL),
(10, 'The new article is awesome', '<p><strong>Lorem</strong></p>', 'the-new-article-is-awesome', 'photo-1430631551618-8db1f56e2857.jpg', 'unactive', '0', 0, '0000-00-00', '2016-12-28 03:01:47', 1, NULL, NULL, NULL, NULL),
(11, 'Test', '<p>hello</p>', 'test', NULL, 'active', '0', 2, '2016-12-28', '2016-12-28 03:03:06', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `privileges`
--

CREATE TABLE `privileges` (
  `no` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `privileges`
--

INSERT INTO `privileges` (`no`, `id_groups`, `id_menu`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 1, '2016-12-24 00:10:01', 1, NULL, NULL, NULL, NULL),
(2, 1, 2, '2016-12-24 00:10:03', 1, NULL, NULL, NULL, NULL),
(3, 1, 3, '2016-12-24 00:10:03', 1, NULL, NULL, NULL, NULL),
(4, 1, 4, '2016-12-24 00:10:04', 1, NULL, NULL, NULL, NULL),
(5, 1, 5, '2016-12-24 00:10:04', 1, NULL, NULL, NULL, NULL),
(6, 1, 6, '2016-12-24 00:10:05', 1, NULL, NULL, NULL, NULL),
(7, 1, 7, '2016-12-24 00:10:06', 1, NULL, NULL, NULL, NULL),
(8, 1, 8, '2016-12-24 00:10:07', 1, NULL, NULL, NULL, NULL),
(9, 1, 9, '2016-12-24 00:10:08', 1, NULL, NULL, NULL, NULL),
(10, 1, 10, '2016-12-24 00:10:09', 1, NULL, NULL, NULL, NULL),
(11, 1, 11, '2016-12-24 00:10:09', 1, NULL, NULL, NULL, NULL),
(12, 1, 12, '2016-12-24 00:10:10', 1, NULL, NULL, NULL, NULL),
(13, 1, 13, '2016-12-24 00:10:12', 1, NULL, NULL, NULL, NULL),
(14, 1, 14, '2016-12-24 00:10:13', 1, NULL, NULL, NULL, NULL),
(15, 1, 15, '2016-12-24 00:10:14', 1, NULL, NULL, NULL, NULL),
(17, 4, 2, '2016-12-24 00:10:43', 1, NULL, NULL, NULL, NULL),
(18, 4, 3, '2016-12-24 00:10:44', 1, NULL, NULL, NULL, NULL),
(19, 4, 4, '2016-12-24 00:10:44', 1, NULL, NULL, NULL, NULL),
(20, 4, 5, '2016-12-24 00:10:45', 1, NULL, NULL, NULL, NULL),
(21, 2, 1, '2016-12-27 03:00:16', 1, NULL, NULL, NULL, NULL),
(22, 2, 2, '2016-12-27 03:00:20', 1, NULL, NULL, NULL, NULL),
(23, 2, 3, '2016-12-27 03:00:21', 1, NULL, NULL, NULL, NULL),
(24, 2, 4, '2016-12-27 03:00:21', 1, NULL, NULL, NULL, NULL),
(25, 2, 5, '2016-12-27 03:00:22', 1, NULL, NULL, NULL, NULL),
(26, 2, 6, '2016-12-27 03:00:25', 1, NULL, NULL, NULL, NULL),
(27, 2, 7, '2016-12-27 03:00:28', 1, NULL, NULL, NULL, NULL),
(28, 2, 8, '2016-12-27 03:00:29', 1, NULL, NULL, NULL, NULL),
(29, 2, 9, '2016-12-27 03:00:31', 1, NULL, NULL, NULL, NULL),
(30, 2, 10, '2016-12-27 03:00:32', 1, NULL, NULL, NULL, NULL),
(31, 3, 1, '2016-12-27 03:03:37', 1, NULL, NULL, NULL, NULL),
(32, 4, 7, '2016-12-27 03:03:58', 1, NULL, NULL, NULL, NULL),
(33, 4, 8, '2016-12-27 03:03:59', 1, NULL, NULL, NULL, NULL),
(34, 4, 9, '2016-12-27 03:04:01', 1, NULL, NULL, NULL, NULL),
(35, 4, 10, '2016-12-27 03:04:02', 1, NULL, NULL, NULL, NULL),
(36, 4, 1, '2016-12-28 05:11:38', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) NOT NULL,
  `pos` int(11) UNSIGNED DEFAULT NULL,
  `created_by` int(2) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `headline`, `body`, `created_at`, `slug`, `pos`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Bagian Ortala', 'Judul Bagian Ortala', '<p><strong style="margin: 0px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</span></p>', '2016-12-28 03:17:27', 'struktur-organisasi-1', 1, 1, '2016-12-29 02:26:15', 1, NULL, NULL),
(2, 'Visi & Misi', 'Judul visi misi', '<p><strong style="margin: 0px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</span></p>', '2016-12-28 03:18:08', 'visi-misi', 0, 1, '2016-12-29 02:26:16', 1, NULL, NULL),
(3, 'Struktur Organisasi', 'judul', '<p><strong style="margin: 0px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</span></p>', '2016-12-28 03:18:27', 'struktur-organisasi', 2, 1, '2016-12-29 02:26:07', 1, NULL, NULL),
(4, 'Tugas Pokok dan Fungsi', 'Judul', '<p><strong style="margin: 0px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</span></p>', '2016-12-28 03:20:14', 'tugas-pokok-dan-fungsi', 3, 1, '2016-12-29 02:23:47', 1, NULL, NULL),
(5, 'Sekar Putih', 'Judul', '<p><strong style="margin: 0px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</span></p>', '2016-12-28 03:21:22', 'sekar-putih', 4, 1, '2016-12-29 02:25:49', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `regulations`
--

CREATE TABLE `regulations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `issued_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `issued_by` varchar(255) DEFAULT NULL,
  `link` text NOT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(2) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `regulations`
--

INSERT INTO `regulations` (`id`, `name`, `body`, `issued_at`, `issued_by`, `link`, `slug`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Regulasi baru', 'Isi regulasi baru', '2016-12-27 17:00:00', 'Admin', 'C:/xampp/htdocs/organisasi/assets/regulations/file-28122016114411.docx', NULL, '2016-12-28 04:44:11', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', 'ee5ef828d84ebcb28fc5ff22c2b648932a596e9c', NULL, NULL, 'y2gkLeoLxmo7BNq2RR5BQ.', 1268889823, 1482992723, 1, 'Super', 'Admin', 'ADMIN', '0'),
(2, '127.0.0.1', 'generaladmin@general.com', '$2y$08$dPbZyqErk9Gzcj4Jc6V6.OQPJPg8Q70hmSgWAkem6ANYLmi8cLvi2', NULL, 'generaladmin@general.com', NULL, NULL, NULL, NULL, 1482558339, 1482559063, 1, 'Moderator', 'test', 'mascitra', '1'),
(3, '127.0.0.1', 'berita@berita.com', '$2y$08$2VYZvKs8g/z0Y5Bfm71rQOmxbYRMPWszg7wG6bZi1Fv054AIc1qD2', NULL, 'berita@berita.com', NULL, NULL, NULL, NULL, 1482558513, 1482861637, 1, 'Admin', 'Berita', 'berita', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(25, 1, 1),
(29, 2, 2),
(30, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_groups` (`id_groups`,`id_menu`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regulations`
--
ALTER TABLE `regulations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `regulations`
--
ALTER TABLE `regulations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
