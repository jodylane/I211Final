-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2018 at 08:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indyLibrary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `bookID` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `author` varchar(75) NOT NULL,
  `publisher` varchar(75) NOT NULL,
  `publicationDate` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `cover` varchar(120) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`bookID`, `title`, `author`, `publisher`, `publicationDate`, `status`, `cover`, `description`) VALUES
(1, 'Harry Potter and the Sorcer\'s Stone', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '1997-06-26', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51HSkTKlauL._SX346_BO1,204,203,200_.jpg', 'In Harry Potter and the Sorcerer\'s Stone, Harry, an orphan, lives with the Dursleys, his horrible aunt and uncle, and their abominable son, Dudley.\r\n\r\nOne day just before his eleventh birthday, an owl tries to deliver a mysterious letter—the first of a sequence of events that end in Harry meeting a giant man named Hagrid. Hagrid explains Harry\'s history to him: When he was a baby, the Dark wizard, Lord Voldemort, attacked and killed his parents in an attempt to kill Harry; but the only mark on Harry was a mysterious lightning-bolt scar on his forehead.\r\n\r\nNow he has been invited to attend Hogwarts School of Witchcraft and Wizardry, where the headmaster is the great wizard Albus Dumbledore. Harry visits Diagon Alley to get his school supplies, especially his very own wand. To get to school, he takes the Hogwarts Express from platform nine and three-quarters at King\'s Cross Station. On the train, he meets two fellow students who will become his closest friends: Ron Weasley and Hermione Granger.\r\n\r\nHarry is assigned to Gryffindor House at Hogwarts, and soon becomes the youngest-ever Seeker on the House Quidditch team. He also studies Potions with Professor Severus Snape, who displays a deep and abiding dislike for Harry, and Defense Against the Dark Arts with nervous Professor Quirrell; he and his friends defeat a mountain troll, help Hagrid raise a dragon, and explore the wonderful, fascinating world of Hogwarts.\r\n\r\nBut all events lead irrevocably toward a second encounter with Lord Voldemort, who seeks an object of legend known as the Sorcerer\'s Stone…'),
(2, 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '1998-07-02', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51jNORv6nQL._SX340_BO1,204,203,200_.jpg', 'The Dursleys were so mean that hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he\'s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike.\r\n\r\nAnd strike it does. For in Harry\'s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockheart, a spirit named Moaning Myrtle who haunts the girls\' bathroom, and the unwanted attentions of Ron Weasley\'s younger sister, Ginny.\r\n\r\nBut each of these seem minor annoyances when the real trouble begins, and someone--or something--starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects...Harry Potter himself?'),
(3, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '1999-07-08', 'Available', 'https://images.gr-assets.com/books/1499277281l/5.jpg', 'For twelve long years, the dread fortress of Azkaban held an infamous prisoner named Sirius Black. Convicted of killing thirteen people with a single curse, he was said to be the heir apparent to the Dark Lord, Voldemort.\r\n\r\nNow he has escaped, leaving only two clues as to where he might be headed: Harry Potter’s defeat of You-Know-Who was Black’s downfall as well. And the Azkaban guards heard Black muttering in his sleep, “He’s at Hogwarts… he’s at Hogwarts.”\r\n\r\nHarry Potter isn’t safe, not even within the walls of his magical school, surrounded by his friends. Because on top of it all, there may be a traitor in their midst.'),
(4, 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2000-07-08', 'Available', 'https://images.gr-assets.com/books/1361482611l/6.jpg', 'Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup. He wants to find out about the mysterious event that\'s supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn\'t happened for a hundred years. He wants to be a normal, fourteen-year-old wizard. But unfortunately for Harry Potter, he\'s not normal - even by wizarding standards. And in his case, different can be deadly.'),
(5, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2003-06-21', 'Available', 'https://images.gr-assets.com/books/1507396732l/2.jpg', 'There is a door at the end of a silent corridor. And it’s haunting Harry Potter’s dreams. Why else would he be waking in the middle of the night, screaming in terror?\r\n\r\nHere are just a few things on Harry’s mind:\r\n - A Defense Against the Dark Arts teacher with a personality like poisoned honey\r\n - A venomous, disgruntled house-elf\r\n - Ron as keeper of the Gryffindor Quidditch team\r\n - The looming terror of the end-of-term Ordinary Wizarding Level exams\r\n\r\n…and of course, the growing threat of He-Who-Must-Not-Be-Named. In the richest installment yet of J. K. Rowling’s seven-part story, Harry Potter is faced with the unreliability of the very government of the magical world and the impotence of the authorities at Hogwarts.\r\n\r\nDespite this (or perhaps because of it), he finds depth and strength in his friends, beyond what even he knew; boundless loyalty; and unbearable sacrifice.\r\n\r\nThough thick runs the plot (as well as the spine), readers will race through these pages and leave Hogwarts, like Harry, wishing only for the next train back.'),
(6, 'Harry Potter and the Half Blood Prince', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2005-07-16', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51uO1pQc5oL._SX329_BO1,204,203,200_.jpg', 'So it’s the home front that takes center stage in the multilayered sixth installment of the story of Harry Potter. Here at Hogwarts, Harry will search for the full and complex story of the boy who became Lord Voldemort — and thereby find what may be his only vulnerability.'),
(7, 'Harry Potter and the Deathly Hallows', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2007-07-21', 'Available', 'https://images.gr-assets.com/books/1474171184l/136251.jpg', 'Readers beware. The brilliant, breathtaking conclusion to J.K. Rowling\'s spellbinding series is not for the faint of heart--such revelations, battles, and betrayals await in Harry Potter and the Deathly Hallows that no fan will make it to the end unscathed. Luckily, Rowling has prepped loyal readers for the end of her series by doling out increasingly dark and dangerous tales of magic and mystery, shot through with lessons about honor and contempt, love and loss, and right and wrong. Fear not, you will find no spoilers in our review--to tell the plot would ruin the journey, and Harry Potter and the Deathly Hallows is an odyssey the likes of which Rowling\'s fans have not yet seen, and are not likely to forget. But we would be remiss if we did not offer one small suggestion before you embark on your final adventure with Harry--bring plenty of tissues.\r\nThe heart of Book 7 is a hero\'s mission--not just in Harry\'s quest for the Horcruxes, but in his journey from boy to man--and Harry faces more danger than that found in all six books combined, from the direct threat of the Death Eaters and you-know-who, to the subtle perils of losing faith in himself. Attentive readers would do well to remember Dumbledore\'s warning about making the choice between \"what is right and what is easy,\" and know that Rowling applies the same difficult principle to the conclusion of her series. While fans will find the answers to hotly speculated questions about Dumbledore, Snape, and you-know-who, it is a testament to Rowling\'s skill as a storyteller that even the most astute and careful reader will be taken by surprise.\r\n\r\nA spectacular finish to a phenomenal series, Harry Potter and the Deathly Hallows is a bittersweet read for fans. The journey is hard, filled with events both tragic and triumphant, the battlefield littered with the bodies of the dearest and despised, but the final chapter is as brilliant and blinding as a phoenix\'s flame, and fans and skeptics alike will emerge from the confines of the story with full but heavy hearts, giddy and grateful for the experience. --Daphne Durham'),
(8, 'Harry Potter and the Cursed Child', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2016-07-30', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51il08aMn%2BL._SX341_BO1,204,203,200_.jpg', 'It was always difficult being Harry Potter and it isn’t much easier now that he is an overworked employee of the Ministry of Magic, a husband, and father of three school-age children.\r\n\r\nWhile Harry grapples with a past that refuses to stay where it belongs, his youngest son, Albus, must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: Sometimes, darkness comes from unexpected places.\r\n\r\nThe playscript for Harry Potter and the Cursed Child was originally released as a \"special rehearsal edition\" alongside the opening of Jack Thorne’s play in London’s West End in summer 2016. Based on an original story by J.K. Rowling, John Tiffany, and Jack Thorne, the play opened to rapturous reviews from theatergoers and critics alike, while the official playscript became an immediate global bestseller.'),
(9, 'Harry Potter and the Cursed Child', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2016-07-30', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51il08aMn%2BL._SX341_BO1,204,203,200_.jpg', 'It was always difficult being Harry Potter and it isn’t much easier now that he is an overworked employee of the Ministry of Magic, a husband, and father of three school-age children.\r\n\r\nWhile Harry grapples with a past that refuses to stay where it belongs, his youngest son, Albus, must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: Sometimes, darkness comes from unexpected places.\r\n\r\nThe playscript for Harry Potter and the Cursed Child was originally released as a \"special rehearsal edition\" alongside the opening of Jack Thorne’s play in London’s West End in summer 2016. Based on an original story by J.K. Rowling, John Tiffany, and Jack Thorne, the play opened to rapturous reviews from theatergoers and critics alike, while the official playscript became an immediate global bestseller.'),
(10, 'Harry Potter and the Cursed Child', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2016-07-30', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51il08aMn%2BL._SX341_BO1,204,203,200_.jpg', 'It was always difficult being Harry Potter and it isn’t much easier now that he is an overworked employee of the Ministry of Magic, a husband, and father of three school-age children.\r\n\r\nWhile Harry grapples with a past that refuses to stay where it belongs, his youngest son, Albus, must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: Sometimes, darkness comes from unexpected places.\r\n\r\nThe playscript for Harry Potter and the Cursed Child was originally released as a \"special rehearsal edition\" alongside the opening of Jack Thorne’s play in London’s West End in summer 2016. Based on an original story by J.K. Rowling, John Tiffany, and Jack Thorne, the play opened to rapturous reviews from theatergoers and critics alike, while the official playscript became an immediate global bestseller.');

-- --------------------------------------------------------

--
-- Table structure for table `BooksRented`
--

CREATE TABLE `BooksRented` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `checkedOut` date NOT NULL,
  `returnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `BooksRented`
--
ALTER TABLE `BooksRented`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `BooksRented`
--
ALTER TABLE `BooksRented`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `BooksRented`
--
ALTER TABLE `BooksRented`
  ADD CONSTRAINT `booksrented_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`),
  ADD CONSTRAINT `booksrented_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `Books` (`bookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
