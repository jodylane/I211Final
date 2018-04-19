-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2018 at 09:36 PM
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
  `status` varchar(30) NOT NULL DEFAULT 'Available',
  `image` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `publish_date`, `status`, `image`, `description`, `category_id`, `isbn`) VALUES
(1, 'Harry Potter and the Sorcer''s Stone', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '1997-06-26', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51HSkTKlauL._SX346_BO1,204,203,200_.jpg', 'In Harry Potter and the Sorcerer''s Stone, Harry, an orphan, lives with the Dursleys, his horrible aunt and uncle, and their abominable son, Dudley.\r\n\r\nOne day just before his eleventh birthday, an owl tries to deliver a mysterious letter—the first of a sequence of events that end in Harry meeting a giant man named Hagrid. Hagrid explains Harry''s history to him: When he was a baby, the Dark wizard, Lord Voldemort, attacked and killed his parents in an attempt to kill Harry; but the only mark on Harry was a mysterious lightning-bolt scar on his forehead.\r\n\r\nNow he has been invited to attend Hogwarts School of Witchcraft and Wizardry, where the headmaster is the great wizard Albus Dumbledore. Harry visits Diagon Alley to get his school supplies, especially his very own wand. To get to school, he takes the Hogwarts Express from platform nine and three-quarters at King''s Cross Station. On the train, he meets two fellow students who will become his closest friends: Ron Weasley and Hermione Granger.\r\n\r\nHarry is assigned to Gryffindor House at Hogwarts, and soon becomes the youngest-ever Seeker on the House Quidditch team. He also studies Potions with Professor Severus Snape, who displays a deep and abiding dislike for Harry, and Defense Against the Dark Arts with nervous Professor Quirrell; he and his friends defeat a mountain troll, help Hagrid raise a dragon, and explore the wonderful, fascinating world of Hogwarts.\r\n\r\nBut all events lead irrevocably toward a second encounter with Lord Voldemort, who seeks an object of legend known as the Sorcerer''s Stone…', 3, '0-7475-3269-9'),
(2, 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '0000-00-00', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51jNORv6nQL._SX340_BO1,204,203,200_.jpg', 'The Dursleys were so mean that hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he&#39;s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike.\r\n\r\nAnd strike it does. For in Harry&#39;s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockheart, a spirit named Moaning Myrtle who haunts the girls&#39; bathroom, and the unwanted attentions of Ron Weasley&#39;s younger sister, Ginny.\r\n\r\nBut each of these seem minor annoyances when the real trouble begins, and someone--or something--starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects...Harry Potter himself?', 3, '0-7475-3849-2'),
(3, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '0000-00-00', 'Available', 'https://images.gr-assets.com/books/1499277281l/5.jpg', 'For twelve long years, the dread fortress of Azkaban held an infamous prisoner named Sirius Black. Convicted of killing thirteen people with a single curse, he was said to be the heir apparent to the Dark Lord, Voldemort.\r\n\r\nNow he has escaped, leaving only two clues as to where he might be headed: Harry Potter&#39;s defeat of You-Know-Who was Black&#39;s downfall as well. And the Azkaban guards heard Black muttering in his sleep, ï¿½He&#39;s at Hogwartsï¿½ he&#39;s at Hogwarts.ï¿½\r\n\r\nHarry Potter isn&#39;t safe, not even within the walls of his magical school, surrounded by his friends. Because on top of it all, there may be a traitor in their midst.', 3, '0-7475-4215-5'),
(4, 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2000-07-08', 'Available', 'https://images.gr-assets.com/books/1361482611l/6.jpg', 'Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup. He wants to find out about the mysterious event that''s supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn''t happened for a hundred years. He wants to be a normal, fourteen-year-old wizard. But unfortunately for Harry Potter, he''s not normal - even by wizarding standards. And in his case, different can be deadly.', 3, '0-7475-4624-X'),
(5, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2003-06-21', 'Available', 'https://images.gr-assets.com/books/1507396732l/2.jpg', 'There is a door at the end of a silent corridor. And it’s haunting Harry Potter’s dreams. Why else would he be waking in the middle of the night, screaming in terror?\r\n\r\nHere are just a few things on Harry’s mind:\r\n - A Defense Against the Dark Arts teacher with a personality like poisoned honey\r\n - A venomous, disgruntled house-elf\r\n - Ron as keeper of the Gryffindor Quidditch team\r\n - The looming terror of the end-of-term Ordinary Wizarding Level exams\r\n\r\n…and of course, the growing threat of He-Who-Must-Not-Be-Named. In the richest installment yet of J. K. Rowling’s seven-part story, Harry Potter is faced with the unreliability of the very government of the magical world and the impotence of the authorities at Hogwarts.\r\n\r\nDespite this (or perhaps because of it), he finds depth and strength in his friends, beyond what even he knew; boundless loyalty; and unbearable sacrifice.\r\n\r\nThough thick runs the plot (as well as the spine), readers will race through these pages and leave Hogwarts, like Harry, wishing only for the next train back.', 3, '0-7475-5100-6'),
(6, 'Harry Potter and the Half Blood Prince', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2005-07-16', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51uO1pQc5oL._SX329_BO1,204,203,200_.jpg', 'So it’s the home front that takes center stage in the multilayered sixth installment of the story of Harry Potter. Here at Hogwarts, Harry will search for the full and complex story of the boy who became Lord Voldemort — and thereby find what may be his only vulnerability.', 3, '0-7475-8108-8'),
(7, 'Harry Potter and the Deathly Hallows', 'J. K. Rowling', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2007-07-21', 'Available', 'https://images.gr-assets.com/books/1474171184l/136251.jpg', 'Readers beware. The brilliant, breathtaking conclusion to J.K. Rowling''s spellbinding series is not for the faint of heart--such revelations, battles, and betrayals await in Harry Potter and the Deathly Hallows that no fan will make it to the end unscathed. Luckily, Rowling has prepped loyal readers for the end of her series by doling out increasingly dark and dangerous tales of magic and mystery, shot through with lessons about honor and contempt, love and loss, and right and wrong. Fear not, you will find no spoilers in our review--to tell the plot would ruin the journey, and Harry Potter and the Deathly Hallows is an odyssey the likes of which Rowling''s fans have not yet seen, and are not likely to forget. But we would be remiss if we did not offer one small suggestion before you embark on your final adventure with Harry--bring plenty of tissues.\r\nThe heart of Book 7 is a hero''s mission--not just in Harry''s quest for the Horcruxes, but in his journey from boy to man--and Harry faces more danger than that found in all six books combined, from the direct threat of the Death Eaters and you-know-who, to the subtle perils of losing faith in himself. Attentive readers would do well to remember Dumbledore''s warning about making the choice between "what is right and what is easy," and know that Rowling applies the same difficult principle to the conclusion of her series. While fans will find the answers to hotly speculated questions about Dumbledore, Snape, and you-know-who, it is a testament to Rowling''s skill as a storyteller that even the most astute and careful reader will be taken by surprise.\r\n\r\nA spectacular finish to a phenomenal series, Harry Potter and the Deathly Hallows is a bittersweet read for fans. The journey is hard, filled with events both tragic and triumphant, the battlefield littered with the bodies of the dearest and despised, but the final chapter is as brilliant and blinding as a phoenix''s flame, and fans and skeptics alike will emerge from the confines of the story with full but heavy hearts, giddy and grateful for the experience. --Daphne Durham', 3, '0-545-01022-5'),
(8, 'Red Wall', 'Brian Jacques', 'Hutchinson (UK) & Philomel (US)', '1986-01-01', 'Available', 'https://booklife-resized.s3-us-west-1.amazonaws.com/29520bb7545aa91fb62efc31de720eff-w204@1x.jpg', 'As the inhabitants of Redwall Abbey bask in the glorious Summer of the Late Rose, all is quiet and peaceful. But things are not as they seem. Cluny the Scourge—the evil one-eyed rat warlord, is hell-bent on destroying the tranquility as he prepares to fight a bloody battle for the ownership of Redwall. This dazzling story in the Redwall series is packed with all the wit, wisdom, humor, and blood-curdling adventure of the other books in the collection, but has the added bonus of taking the reader right back to the heart and soul of Redwall Abbey and the characters who live there.', 1, '0-399-21424-0'),
(9, 'The Tale of Despereaux', 'Kate DiCamillo', 'Candlewick Press', '2003-08-25', 'Available', 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e5/The_Tale_of_Despereaux.jpg/220px-The_Tale_of_Despereaux.jpg', 'The Tale of Despereaux is a 2003 fantasy book written by Kate DiCamillo. The main plot follows the adventures of a mouse named Despereaux Tilling, as he sets out on his quest to rescue a beautiful human princess from the rats. The novel is divided into four "books" and ends with a coda. Each "book" tells the story from a different character''s or group of characters'' perspective, and finally all of them combined. The book won the 2004 Newbery Medal award.', 1, '0-7636-1722-9'),
(10, 'Adobe Photoshop CSS6 Digital Classroom', 'Jennifer A. Smith', 'Scholastic Corporations (US), Bloomsbury Publishing (UK)', '2012-06-13', 'Available', 'http://a4.mzstatic.com/us/r30/Publication/v4/a4/22/9e/a4229e93-5897-4c10-adb7-8219b503a50c/cover225x225.jpeg', 'The Digital Classroom series combines a full-color book with a full-featured DVD, resulting in a complete training package written by expert instructors. Photoshop is the industry standard for image editing, and this guide gets photographers, commercial designers, web developers, fine artists, and serious hobbyists up to speed on the newest version. It includes 13 self-paced lessons that allow you to progress at your own speed, with complete lesson files and tutorials on the DVD. Topics include Camera RAW, masks and layers, retouching, and much more.', 2, '978-3-16-1484'),
(11, 'Farenheit 451', 'Ray Bradbury', 'Ballantine Books', '1953-10-09', 'Available', 'https://www.lwcurrey.com/pictures/medium/111876.jpg', 'Ray Bradbury’s internationally acclaimed novel Fahrenheit 451 is a masterwork of twentieth-century literature set in a bleak, dystopian future.\r\n\r\nGuy Montag is a fireman. In his world, where television rules and literature is on the brink of extinction, firemen start fires rather than put them out. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden.\r\n\r\nMontag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television “family.” But then he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn’t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television.\r\n\r\nWhen Mildred attempts suicide and Clarisse suddenly disappears, Montag begins to question everything he has ever known. He starts hiding books in his home, and when his pilfering is discovered, the fireman has to run for his life.', 7, '123-4-13-157370-6'),
(12, 'Brave New World', 'Aldous Huxley\r\n', 'Rosetta Books', '1932-03-23', 'Available', 'https://upload.wikimedia.org/wikipedia/en/thumb/6/62/BraveNewWorld_FirstEdition.jpg/220px-BraveNewWorld_FirstEdition.jpg', 'Aldous Huxley''s profoundly important classic of world literature, Brave New World is a searching vision of an unequal, technologically-advanced future where humans are genetically bred, socially indoctrinated, and pharmaceutically anesthetized to passively uphold an authoritarian ruling order--all at the cost of our freedom, full humanity, and perhaps also our souls. “A genius [who] who spent his life decrying the onward march of the Machine” (The New Yorker), Huxley was a man of incomparable talents: equally an artist, a spiritual seeker, and one of history’s keenest observers of human nature and civilization. Brave New World, his masterpiece, has enthralled and terrified millions of readers, and retains its urgent relevance to this day as both a warning to be heeded as we head into tomorrow and as thought-provoking, satisfying work of literature. Written in the shadow of the rise of fascism during the 1930s, Brave New World likewise speaks to a 21st-century world dominated by mass-entertainment, technology, medicine and pharmaceuticals, the arts of persuasion, and the hidden influence of elites. ', 7, '643-3-53-325216-7'),
(13, 'Dandelion Wine', 'Ray Bradbury', 'Double Day', '1957-12-24', 'Available', 'https://i.harperapps.com/covers/9780380977260/x500.jpg', 'The summer of ''28 was a vintage season for a growing boy. A summer of green apple trees, mowed lawns, and new sneakers. Of half-burnt firecrackers, of gathering dandelions, of Grandma''s belly-busting dinner. It was a summer of sorrows and marvels and gold-fuzzed bees. A magical, timeless summer in the life of a twelve-year-old boy named Douglas Spaulding—remembered forever by the incomparable Ray Bradbury.', 8, '876-2-23-214860-3'),
(14, 'The Giver', 'Lois Lowry', 'Houghton Mifflin Harcourt', '1993-01-01', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51fRar1PvAL._SX300_BO1,204,203,200_.jpg', 'Jonas''s world is perfect. Everything is under control. There is no war or fear of pain. There are no choices. Every person is assigned a role in the community. When Jonas turns 12 he is singled out to receive special training from The Giver. The Giver alone holds the memories of the true pain and pleasure of life. Now, it is time for Jonas to receive the truth. There is no turning back.', 7, '742-2-13-124569-1'),
(15, 'The Catcher in the Rye', 'J. D. Salinger', 'Little, Brown and Company', '1951-02-21', 'Available', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/32/Rye_catcher.jpg/220px-Rye_catcher.jpg', 'Anyone who has read J.D. Salinger''s New Yorker stories, particularly A Perfect Day for Bananafish, Uncle Wiggily in Connecticut, The Laughing Man, and For Esme--With Love and Squalor, will not be surprised by the fact that his first novel is full of children. \r\n\r\nThe hero-narrator of THE CATCHER IN THE RYE is an ancient child of sixteen, a native New Yorker named Holden Caulfield. Through circumstances that tend to preclude adult, secondhand description, he leaves his prep school in Pennsylvania and goes underground in New York City for three days. \r\n\r\nThe boy himself is at once too simple and too complex for us to make any final comment about him or his story. Perhaps the safest thing we can say about Holden is that he was born in the world not just strongly attracted to beauty but, almost, hopelessly impaled on it. \r\n\r\nThere are many voices in this novel: children''s voices, adult voices, underground voices--but Holden''s voice is the most eloquent of all. Transcending his own vernacular, yet remaining marvelously faithful to it, he issues a perfectly articulated cry of mixed pain and pleasure. However, like most lovers and clowns and poets of the higher orders, he keeps most of the pain to, and for, himself. The pleasure he gives away, or sets aside, with all his heart. It is there for the reader who can handle it to keep.', 1, '124-4-34-761236-7'),
(16, 'The Grapes of Wrath', 'John Steinbeck', 'The Viking Press-James Lloyd', '1939-04-14', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/516jmaZ8r9L._SX323_BO1,204,203,200_.jpg', 'First published in 1939, Steinbeck’s Pulitzer Prize-winning epic of the Great Depression chronicles the Dust Bowl migration of the 1930s and tells the story of one Oklahoma farm family, the Joads—driven from their homestead and forced to travel west to the promised land of California. Out of their trials and their repeated collisions against the hard realities of an America divided into Haves and Have-Nots evolves a drama that is intensely human yet majestic in its scale and moral vision, elemental yet plainspoken, tragic but ultimately stirring in its human dignity. A portrait of the conflict between the powerful and the powerless, of one man’s fierce reaction to injustice, and of one woman’s stoical strength, the novel captures the horrors of the Great Depression and probes into the very nature of equality and justice in America. At once a naturalistic epic, captivity narrative, road novel, and transcendental gospel, Steinbeck’s powerful landmark novel is perhaps the most American of American Classics.\r\n\r\nThis Penguin Classics edition contains an introduction and notes by Steinbeck scholar Robert Demott.\r\n\r\nFor more than seventy years, Penguin has been the leading publisher of classic literature in the English-speaking world. With more than 1,700 titles, Penguin Classics represents a global bookshelf of the best works throughout history and across genres and disciplines. Readers trust the series to provide authoritative texts enhanced by introductions and notes by distinguished scholars and contemporary authors, as well as up-to-date translations by award-winning translators.', 9, '9787532730032'),
(17, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Scribner''s', '1925-04-10', 'Available', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f7/TheGreatGatsby_1925jacket.jpeg/220px-TheGreatGatsby_1925jacket.jpeg', 'The Great Gatsby, F. Scott Fitzgerald''s third book, stands as the supreme achievement of his career. This exemplary novel of the Jazz Age has been acclaimed by generations of readers. The story of the fabulously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan, of lavish parties on Long Island at a time when The New York Times noted "gin was the national drink and sex the national obsession," it is an exquisitely crafted tale of America in the 1920s.', 9, '9781556513268'),
(18, 'Nineteen Eighty-Four', 'George Orwell', 'Harvill Secker', '1949-06-06', 'Available', 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/1984first.jpg/220px-1984first.jpg', '“The Party told you to reject the evidence of your eyes and ears. It was their final, most essential command.”\r\n\r\nWinston Smith toes the Party line, rewriting history to satisfy the demands of the Ministry of Truth. With each lie he writes, Winston grows to hate the Party that seeks power for its own sake and persecutes those who dare to commit thoughtcrimes. But as he starts to think for himself, Winston can’t escape the fact that Big Brother is always watching...\r\n\r\nA startling and haunting vision of the world, 1984 is so powerful that it is completely convincing from start to finish. No one can deny the influence of this novel, its hold on the imaginations of multiple generations of readers, or the resiliency of its admonitions—a legacy that seems only to grow with the passage of time.', 7, '9781471331435'),
(19, 'Ulysses', 'James Joyce', 'Sylvia Beach', '1922-02-02', 'Available', 'https://assets.americanliterature.com/al/images/book/ulysses.jpg', 'Ulysses is a novel by Irish writer James Joyce. It was first serialised in parts in the American journal The Little Review from March 1918 to December 1920, and then published in its entirety by Sylvia Beach in February 1922, in Paris. It is considered to be one of the most important works of Modernist literature, and has been called "a demonstration and summation of the entire movement". "Before Joyce, no writer of fiction had so foregrounded the process of thinking." However, even proponents of Ulysses such as Anthony Burgess have described the book as "inimitable, and also possibly mad".', 7, '9788854139343'),
(20, 'Lolita', 'Vladimir Nabokov', 'Olympia Press', '1955-00-00', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/41s2G6WxLvL._SX322_BO1,204,203,200_.jpg', 'Awe and exhiliration--along with heartbreak and mordant wit--abound in Lolita, Nabokov''s most famous and controversial novel, which tells the story of the aging Humbert Humbert''s obsessive, devouring, and doomed passion for the nymphet Dolores Haze. Lolita is also the story of a hypercivilized European colliding with the cheerful barbarism of postwar America. Most of all, it is a meditation on love--love as outrage and hallucination, madness and transformation.', 9, '9780425020913'),
(21, 'Catch 22', 'Joseph Heller', 'Simon & Schuster\r\n', '1961-11-10', 'Available', 'https://images.gr-assets.com/books/1463157317l/168668.jpg', 'Set in Italy during World War II, this is the story of the incomparable, malingering bombardier, Yossarian, a hero who is furious because thousands of people he has never met are trying to kill him. But his real problem is not the enemy—it is his own army, which keeps increasing the number of missions the men must fly to complete their service. Yet if Yossarian makes any attempt to excuse himself from the perilous missions he’s assigned, he’ll be in violation of Catch-22, a hilariously sinister bureaucratic rule: a man is considered insane if he willingly continues to fly dangerous combat missions, but if he makes a formal request to be removed from duty, he is proven sane and therefore ineligible to be relieved. \r\n\r\nThis fiftieth-anniversary edition commemorates Joseph Heller’s masterpiece with a new introduction by Christopher Buckley; a wealth of critical essays and reviews by Norman Mailer, Alfred Kazin, Anthony Burgess, and others; rare papers and photos from Joseph Heller’s personal archive; and much more. Here, at last, is the definitive edition of a classic of world literature.', 10, '9780684833392'),
(22, 'The Sound and the Fury', 'William Faulkner', '', '1929-00-00', 'Available', 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e3/TheSoundAndTheFuryCover.jpg/220px-TheSoundAndTheFuryCover.jpg', '“I give you the mausoleum of all hope and desire. . . . I give it to you not that you may remember time, but that you might forget it now and then for a moment and not spend all of your breath trying to conquer it. Because no battle is ever won he said. They are not even fought. The field only reveals to man his own folly and despair, and victory is an illusion of philosophers and fools.” —from The Sound and the Fury\r\n \r\nThe Sound and the Fury is the tragedy of the Compson family, featuring some of the most memorable characters in literature: beautiful, rebellious Caddy; the manchild Benjy; haunted, neurotic Quentin; Jason, the brutal cynic; and Dilsey, their black servant. Their lives fragmented and harrowed by history and legacy, the character’s voices and actions mesh to create what is arguably Faulkner’s masterpiece and  one of the greatest novels of the twentieth century.', 11, '9781324000822'),
(23, 'To Kill a Mockingbird', 'Harper Lee', 'Warner Books, Inc.', '1960-07-11', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51N5qVjuKAL._SX309_BO1,204,203,200_.jpg', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\r\n\r\nCompassionate, dramatic, and deeply moving, To Kill A Mockingbird takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', 12, '9788931001990'),
(24, 'One Hundred Years of Solitude', 'Gabriel García Márquez', 'Harper (US), Johnathan Cape (UK)', '1967-05-30', 'Available', 'https://thingsthatmadeanimpression.files.wordpress.com/2018/03/picture-100yearsofsolitude-marquez.jpg?w=500', 'One Hundred Years of Solitude tells the story of the rise and fall, birth and death of the mythical town of Macondo through the history of the Buendia family. Inventive, amusing, magnetic, sad, and alive with unforgettable men and women—brimming with truth, compassion, and a lyrical magic that strikes the soul—this novel is a masterpiece in the art of fiction.', 9, '9789631420494'),
(25, 'To the Lighthouse', 'Virginia Woolf', 'Hogarth Press', '1927-05-05', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51959IXVikL._SX326_BO1,204,203,200_.jpg', '“Radiant as [To the Lighthouse] is in its beauty, there could never be a mistake about it: here is a novel to the last degree severe and uncompromising. I think that beyond being about the very nature of reality, it is itself a vision of reality.”—Eudora Welty, from the Introduction.The serene and maternal Mrs. Ramsay, the tragic yet absurd Mr. Ramsay, and their children and assorted guests are on holiday on the Isle of Skye. From the seemingly trivial postponement of a visit to a nearby lighthouse, Woolf constructs a remarkable, moving examination of the complex tensions and allegiances of family life and the conflict between men and women.', 12, '9780795310522'),
(26, 'Invisible Man', 'Ralph Ellison', 'Random House', '1952-00-00', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/41AlDDhzNlL._SX324_BO1,204,203,200_.jpg', 'Invisible Man is a milestone in American literature, a book that has continued to engage readers since its appearance in 1952. A first novel by an unknown writer, it remained on the bestseller list for sixteen weeks, won the National Book Award for fiction, and established Ralph Ellison as one of the key writers of the century. The nameless narrator of the novel describes growing up in a black community in the South, attending a Negro college from which he is expelled, moving to New York and becoming the chief spokesman of the Harlem branch of "the Brotherhood", and retreating amid violence and confusion to the basement lair of the Invisible Man he imagines himself to be. The book is a passionate and witty tour de force of style, strongly influenced by T.S. Eliot''s The Waste Land, Joyce, and Dostoevsky.', 13, '9780679600152'),
(27, 'Gone With the Wind', 'Margaret Mitchell', 'Macmillan Publishers', '1936-06-30', 'Available', 'https://images.gr-assets.com/books/1328025229l/18405.jpg', 'Margaret Mitchell''s epic novel of love and war won the Pulitzer Prize and went on to give rise to two authorized sequels and one of the most popular and celebrated movies of all time. \r\n\r\nMany novels have been written about the Civil War and its aftermath. None take us into the burning fields and cities of the American South as Gone With the Wind does, creating haunting scenes and thrilling portraits of characters so vivid that we remember their words and feel their fear and hunger for the rest of our lives. \r\n\r\nIn the two main characters, the white-shouldered, irresistible Scarlett and the flashy, contemptuous Rhett, Margaret Mitchell not only conveyed a timeless story of survival under the harshest of ', 10, '9787806571491'),
(28, 'Jane Eyre', 'Charlotte Brontë', 'Smith, Elder & Co.', '1847-10-16', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51KPlGsw7-L.jpg', 'Orphaned at an early age, Jane Eyre, leads a lonely life until she finds a position as a governess at Thornfield Hall. There she meets the mysterious Mr. Rochester and sees a ghostly woman who roams the halls at night. What is the sinister secret that threatens Jane and her new found happiness? Step into Classics(TM) adaptations feature easy-to-read texts, big type, and short chapters that are ideal for reluctant readers and kids not yet ready to tackle original classics.', 9, '9781519133977'),
(29, 'On the Road', 'Jack Kerouac', 'Viking Press', '1957-09-05', 'Available', 'https://images-na.ssl-images-amazon.com/images/I/51hkNOLyQiL.jpg', 'Inspired by Jack Kerouac''s adventures with Neal Cassady, On the Road tells the story of two friends whose cross-country road trips are a quest for meaning and true experience. Written with a mixture of sad-eyed naiveté and wild ambition and imbued with Kerouac''s love of America, his compassion for humanity, and his sense of language as jazz, On the Road is the quintessential American vision of freedom and hope, a book that changed American literature and changed anyone who has ever picked it up.', 14, '9780848814014'),
(30, 'Lord of the Flies', 'William Golding', 'Faber and Faber', '1954-09-17', 'Available', 'https://upload.wikimedia.org/wikipedia/en/thumb/9/9b/LordOfTheFliesBookCover.jpg/220px-LordOfTheFliesBookCover.jpg', 'At the dawn of the next world war, a plane crashes on an uncharted island, stranding a group of schoolboys. At first, with no adult supervision, their freedom is something to celebrate. This far from civilization they can do anything they want. Anything. But as order collapses, as strange howls echo in the night, as terror begins its reign, the hope of adventure seems as far removed from reality as the hope of being rescued.', 1, '9781404690301'),
(47, 'Cirque Du Freak: A Living Nightmare', 'Darren Shan', 'HarperCollins', '0000-00-00', 'Available', 'https://vignette.wikia.nocookie.net/darrenshan/images/9/9c/Cirque_du_freak.jpg/revision/latest?cb=20091106141445', 'Darren Shan&#39;s an ordinary schoolboy, until he and his best friend Steve get tickets to the Cirque Du Freak, a bizarre freak show featuring such arcane performers as Hans Hands, Gertha Teeth, the Wolf Man and Rhamus Twobellies. In the midst of the ghoulish excitement, true terror raises its head when Steve recognises that one of the performers -- Mr Crepsley -- is in fact a vampire! Steve remains after the show finishes, to confront the vampire -- but his motives are anything but ordinary! In the shadows of a crumbling theatre, a horrified Darren eavesdrops on his friend and the vampire, and is witness to a monstrous, disturbing plea. Later, in a moment of insane daring, Darren sets out to steal the vampire&#39;s magnificent performing tarantula, an act which will have severe, tragic consequences for both Darren and Steve. Their lives will never be the same again ...', 1, '0-00-713900-4'),
(51, 'Cirque Du Freak: The Vampires Assistant', 'Darren Shan', 'HarperCollins', '2000-06-01', 'Available', 'https://pictures.abebooks.com/isbn/9780316606103-us.jpg', 'Darren Shan was just an ordinary schoolboy until his visit to the Cirque Du Freak. Now, as he struggles with his new life as a Vampire&#39;s Assistant, he tries desperately to resist the one temptation that sickens him, the one thing that can keep him alive. But destiny is calling. The Wolf Man is waiting.', 1, '0316606847');

-- --------------------------------------------------------

--
-- Table structure for table `books_categories`
--

CREATE TABLE IF NOT EXISTS `books_categories` (
`id` int(11) NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `books_categories`
--

INSERT INTO `books_categories` (`id`, `category`) VALUES
(1, 'Fiction'),
(2, 'Technology'),
(3, 'Fantasy'),
(4, 'Mystery'),
(5, 'Romance'),
(6, 'Thriller'),
(7, 'Utopian'),
(8, 'Science Fiction'),
(9, 'Novel'),
(10, 'Historical Fiction'),
(11, 'Modern Literature'),
(12, 'Coming-of-Age Fiction'),
(13, 'Social commentary'),
(14, 'Beat generation');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `books_categories`
--
ALTER TABLE `books_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
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
