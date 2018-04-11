-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2018 at 12:37 AM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indylibrary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
`id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `author` varchar(75) NOT NULL,
  `publisher` varchar(75) NOT NULL,
  `publish_date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `image` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `isbn` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `publish_date`, `status`, `image`, `description`, `category_id`, `isbn`) VALUES
(1, 'Harry Potter and the Sorcer''s Stone', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '1997-06-26', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51HSkTKlauL._SX346_BO1,204,203,200_.jpg', 'In Harry Potter and the Sorcerer''s Stone, Harry, an orphan, lives with the Dursleys, his horrible aunt and uncle, and their abominable son, Dudley.\r\n\r\nOne day just before his eleventh birthday, an owl tries to deliver a mysterious letter—the first of a sequence of events that end in Harry meeting a giant man named Hagrid. Hagrid explains Harry''s history to him: When he was a baby, the Dark wizard, Lord Voldemort, attacked and killed his parents in an attempt to kill Harry; but the only mark on Harry was a mysterious lightning-bolt scar on his forehead.\r\n\r\nNow he has been invited to attend Hogwarts School of Witchcraft and Wizardry, where the headmaster is the great wizard Albus Dumbledore. Harry visits Diagon Alley to get his school supplies, especially his very own wand. To get to school, he takes the Hogwarts Express from platform nine and three-quarters at King''s Cross Station. On the train, he meets two fellow students who will become his closest friends: Ron Weasley and Hermione Granger.\r\n\r\nHarry is assigned to Gryffindor House at Hogwarts, and soon becomes the youngest-ever Seeker on the House Quidditch team. He also studies Potions with Professor Severus Snape, who displays a deep and abiding dislike for Harry, and Defense Against the Dark Arts with nervous Professor Quirrell; he and his friends defeat a mountain troll, help Hagrid raise a dragon, and explore the wonderful, fascinating world of Hogwarts.\r\n\r\nBut all events lead irrevocably toward a second encounter with Lord Voldemort, who seeks an object of legend known as the Sorcerer''s Stone…', 1, '0-7475-3269-9'),
(2, 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '1998-07-02', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51jNORv6nQL._SX340_BO1,204,203,200_.jpg', 'The Dursleys were so mean that hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he''s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike.\r\n\r\nAnd strike it does. For in Harry''s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockheart, a spirit named Moaning Myrtle who haunts the girls'' bathroom, and the unwanted attentions of Ron Weasley''s younger sister, Ginny.\r\n\r\nBut each of these seem minor annoyances when the real trouble begins, and someone--or something--starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects...Harry Potter himself?', 1, '0-7475-3849-2'),
(3, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '1999-07-08', 'Available', 'https://images.gr-assets.com/books/1499277281l/5.jpg', 'For twelve long years, the dread fortress of Azkaban held an infamous prisoner named Sirius Black. Convicted of killing thirteen people with a single curse, he was said to be the heir apparent to the Dark Lord, Voldemort.\r\n\r\nNow he has escaped, leaving only two clues as to where he might be headed: Harry Potter’s defeat of You-Know-Who was Black’s downfall as well. And the Azkaban guards heard Black muttering in his sleep, “He’s at Hogwarts… he’s at Hogwarts.”\r\n\r\nHarry Potter isn’t safe, not even within the walls of his magical school, surrounded by his friends. Because on top of it all, there may be a traitor in their midst.', 1, '0-7475-4215-5'),
(4, 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2000-07-08', 'Available', 'https://images.gr-assets.com/books/1361482611l/6.jpg', 'Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup. He wants to find out about the mysterious event that''s supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn''t happened for a hundred years. He wants to be a normal, fourteen-year-old wizard. But unfortunately for Harry Potter, he''s not normal - even by wizarding standards. And in his case, different can be deadly.', 1, '0-7475-4624-X'),
(5, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2003-06-21', 'Available', 'https://images.gr-assets.com/books/1507396732l/2.jpg', 'There is a door at the end of a silent corridor. And it’s haunting Harry Potter’s dreams. Why else would he be waking in the middle of the night, screaming in terror?\r\n\r\nHere are just a few things on Harry’s mind:\r\n - A Defense Against the Dark Arts teacher with a personality like poisoned honey\r\n - A venomous, disgruntled house-elf\r\n - Ron as keeper of the Gryffindor Quidditch team\r\n - The looming terror of the end-of-term Ordinary Wizarding Level exams\r\n\r\n…and of course, the growing threat of He-Who-Must-Not-Be-Named. In the richest installment yet of J. K. Rowling’s seven-part story, Harry Potter is faced with the unreliability of the very government of the magical world and the impotence of the authorities at Hogwarts.\r\n\r\nDespite this (or perhaps because of it), he finds depth and strength in his friends, beyond what even he knew; boundless loyalty; and unbearable sacrifice.\r\n\r\nThough thick runs the plot (as well as the spine), readers will race through these pages and leave Hogwarts, like Harry, wishing only for the next train back.', 1, '0-7475-5100-6'),
(6, 'Harry Potter and the Half Blood Prince', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2005-07-16', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51uO1pQc5oL._SX329_BO1,204,203,200_.jpg', 'So it’s the home front that takes center stage in the multilayered sixth installment of the story of Harry Potter. Here at Hogwarts, Harry will search for the full and complex story of the boy who became Lord Voldemort — and thereby find what may be his only vulnerability.', 1, '0-7475-8108-8'),
(7, 'Harry Potter and the Deathly Hallows', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2007-07-21', 'Available', 'https://images.gr-assets.com/books/1474171184l/136251.jpg', 'Readers beware. The brilliant, breathtaking conclusion to J.K. Rowling''s spellbinding series is not for the faint of heart--such revelations, battles, and betrayals await in Harry Potter and the Deathly Hallows that no fan will make it to the end unscathed. Luckily, Rowling has prepped loyal readers for the end of her series by doling out increasingly dark and dangerous tales of magic and mystery, shot through with lessons about honor and contempt, love and loss, and right and wrong. Fear not, you will find no spoilers in our review--to tell the plot would ruin the journey, and Harry Potter and the Deathly Hallows is an odyssey the likes of which Rowling''s fans have not yet seen, and are not likely to forget. But we would be remiss if we did not offer one small suggestion before you embark on your final adventure with Harry--bring plenty of tissues.\r\nThe heart of Book 7 is a hero''s mission--not just in Harry''s quest for the Horcruxes, but in his journey from boy to man--and Harry faces more danger than that found in all six books combined, from the direct threat of the Death Eaters and you-know-who, to the subtle perils of losing faith in himself. Attentive readers would do well to remember Dumbledore''s warning about making the choice between "what is right and what is easy," and know that Rowling applies the same difficult principle to the conclusion of her series. While fans will find the answers to hotly speculated questions about Dumbledore, Snape, and you-know-who, it is a testament to Rowling''s skill as a storyteller that even the most astute and careful reader will be taken by surprise.\r\n\r\nA spectacular finish to a phenomenal series, Harry Potter and the Deathly Hallows is a bittersweet read for fans. The journey is hard, filled with events both tragic and triumphant, the battlefield littered with the bodies of the dearest and despised, but the final chapter is as brilliant and blinding as a phoenix''s flame, and fans and skeptics alike will emerge from the confines of the story with full but heavy hearts, giddy and grateful for the experience. --Daphne Durham', 1, '0-545-01022-5'),
(8, 'Red Wall', 'Brian Jacques', 'Hutchinson (UK) & Philomel (US)', '1986-01-01', 'Available', 'https://booklife-resized.s3-us-west-1.amazonaws.com/29520bb7545aa91fb62efc31de720eff-w204@1x.jpg', 'As the inhabitants of Redwall Abbey bask in the glorious Summer of the Late Rose, all is quiet and peaceful. But things are not as they seem. Cluny the Scourge—the evil one-eyed rat warlord, is hell-bent on destroying the tranquility as he prepares to fight a bloody battle for the ownership of Redwall. This dazzling story in the Redwall series is packed with all the wit, wisdom, humor, and blood-curdling adventure of the other books in the collection, but has the added bonus of taking the reader right back to the heart and soul of Redwall Abbey and the characters who live there.', 1, '0-399-21424-0'),
(9, 'The Tale of Despereaux', 'Kate DiCamillo', 'Candlewick Press', '2003-08-25', 'Available', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUTExMVFRUVGBgYFxgVFxcVFRcYFhcYFxcXGBgYHSggGBolGxYVITEhJ', 'The Tale of Despereaux is a 2003 fantasy book written by Kate DiCamillo. The main plot follows the adventures of a mouse named Despereaux Tilling, as he sets out on his quest to rescue a beautiful human princess from the rats. The novel is divided into four "books" and ends with a coda. Each "book" tells the story from a different character''s or group of characters'' perspective, and finally all of them combined. The book won the 2004 Newbery Medal award.', 1, '0-7636-1722-9'),
(10, 'Adobe Photoshop CSS6 Digital Classroom', 'Jennifer A. Smith', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2012-06-13', 'Available', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUSEhIVFhUWGBYYFxcWFxsXFxgWGBcWFxYYFRgYHSggGBolGxUXITEhJ', 'The Digital Classroom series combines a full-color book with a full-featured DVD, resulting in a complete training package written by expert instructors. Photoshop is the industry standard for image editing, and this guide gets photographers, commercial designers, web developers, fine artists, and serious hobbyists up to speed on the newest version. It includes 13 self-paced lessons that allow you to progress at your own speed, with complete lesson files and tutorials on the DVD. Topics include Camera RAW, masks and layers, retouching, and much more.', 2, '1118123891');

-- --------------------------------------------------------

--
-- Table structure for table `books_categories`
--

CREATE TABLE IF NOT EXISTS `books_categories` (
`id` int(11) NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `books_categories`
--

INSERT INTO `books_categories` (`id`, `category`) VALUES
(1, 'Fantasy'),
(2, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_books`
--

CREATE TABLE IF NOT EXISTS `users_books` (
`id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checked_out` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_categories`
--
ALTER TABLE `books_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `books_categories`
--
ALTER TABLE `books_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_books`
--
ALTER TABLE `users_books`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
