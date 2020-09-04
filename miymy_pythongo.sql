-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2020 at 09:58 PM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miymy_pythongo`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chp_id` int(11) NOT NULL,
  `chp_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chp_id`, `chp_name`) VALUES
(1, 'Loop'),
(3, 'String'),
(4, 'Operator'),
(6, 'Number'),
(7, 'Variable'),
(8, 'If Else'),
(9, 'List'),
(10, 'bleh');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `code_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `code_info` text NOT NULL,
  `subchp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`code_id`, `code`, `code_info`, `subchp_id`) VALUES
(1, 'primes = [2, 3, 5, 7]\r\nfor prime in primes:\r\n    print(prime)', 'For loops iterate over a given sequence. Here is an example:', 1),
(2, '# Prints out the numbers 0,1,2,3,4\r\nfor x in range(5):\r\n    print(x)\r\n\r\n# Prints out 3,4,5\r\nfor x in range(3, 6):\r\n    print(x)\r\n\r\n# Prints out 3,5,7\r\nfor x in range(3, 8, 2):\r\n    print(x)', 'For loops can iterate over a sequence of numbers using the \"range\" and \"xrange\" functions. The difference between range and xrange is that the range function returns a new list with numbers of that specified range.', 1),
(3, '# Prints out 0,1,2,3,4\r\n\r\ncount = 0\r\nwhile count < 5:\r\n    print(count)\r\n    count += 1  # This is the same as count = count + 1', 'While loops repeat as long as a certain boolean condition is met. For example:', 2),
(4, '', 'String literals in python are surrounded by either single or double quotation marks.', 3),
(5, 'a = \"Hello, World!\"\r\nprint(a[1])', 'Get the character at position 1 (remember that the first character has the position 0)', 3),
(6, 'b = \"Hello, World!\"\r\nprint(b[2:5])', 'Substring. Get the characters from position 2 to position 5 (not included):', 3),
(7, 'a = \" Hello, World! \"\r\nprint(a.strip()) # returns \"Hello, World!\"', 'The strip() method removes any whitespace from the beginning or the end:', 3),
(8, 'a = \"Hello, World!\"\r\nprint(len(a))', 'The len() method returns the length of a string:', 3),
(9, 'a = \"Hello, World!\"\r\nprint(len(a))', 'The len() method returns the length of a string:', 3),
(10, 'a = \"Hello, World!\"\r\nprint(a.lower())\r\n', 'The lower() method returns the string in lower case:', 3),
(11, 'a = \"Hello, World!\"\r\nprint(a.upper())\r\n', 'The upper() method returns the string in upper case:', 3),
(13, '', 'Python allows for command line input. Means we are able to ask the user for input.', 4),
(14, 'a = \"Hello, World!\"\r\nprint(a.replace(\"H\", \"J\"))\r\n', 'The replace() method replaces a string with another string', 3),
(16, 'a = \"Hello, World!\"\r\nprint(a.split(\",\"))\r\n', 'The split() method splits the string into substrings if it finds instances of the separator', 3),
(17, 'print(\"Enter your name:\")\nx = input()\nprint(\"Hello, \" + x)', 'The following example asks for the user name, then, by using the input() method, the program prints the name to the screen:\r\n\r\n', 4),
(18, 'x = 1\r\ny = 35656222554887711\r\nz = -3255522\r\n\r\nprint(type(x))\r\nprint(type(y))\r\nprint(type(z))\r\n', 'Int, or integer, is a whole number, + or -, without decimals, of unlimited length.', 6),
(19, 'x = 1.10\r\ny = 1.0\r\nz = -35.59\r\n\r\nprint(type(x))\r\nprint(type(y))\r\nprint(type(z))\r\n', 'Float is a number, positive or negative, containing one or more decimals.', 7),
(20, 'x = 3+5j\r\ny = 5j\r\nz = -5j\r\n\r\nprint(type(x))\r\nprint(type(y))\r\nprint(type(z))\r\n', 'Complex numbers are written with a \"j\" as the imaginary part.', 8),
(21, 'x = 5\r\ny = \"John\"\r\nprint(x)\r\nprint(y)\r\n', 'A variable is created the moment you first assign a value to it.', 9),
(22, 'x = \"awesome\"\r\nprint(\"Python is \" + x)\r\n', 'The Python print statement is often used to output variables. To combine both text and a variable, Python uses the + character:', 10),
(23, 'x = 5\r\ny = 3\r\n\r\nprint(x + y)\r\nprint(x - y)\r\nprint(x * y)\r\nprint(x / y)\r\n', 'Addition, Subtraction, Multiplication, Division', 11),
(24, 'a = 33\r\nb = 200\r\nif b > a:\r\n    print(\"b is greater than a\")\r\n', 'In this example we use two variables, a and b, which are used as part of the if statement to test whether b is greater than a. As a is 33, and b is 200, we know that 200 is greater than 33, and so we print to screen that \"b is greater than a\".', 12),
(25, 'a = 33\nb = 33\nif b > a:\n    print(\"b is greater than a\")\nelif a == b:\n    print(\"a and b are equal\")\n', 'The elif keyword is python way of saying \"if the previous conditions were not true, then try this condition\".', 13),
(26, 'a = 200\nb = 33\nif b > a:\n    print(\"b is greater than a\")\nelif a == b:\n    print(\"a and b are equal\")\nelse:\n    print(\"a is greater than b\")\n', 'The else keyword catches anything which is not caught by the preceding conditions.', 14),
(27, 'a = 200\nb = 33\n\nif a > b: print(\"a is greater than b\")\n', 'If you have only one statement to execute, one for if, and one for else, you can put it all on the same line', 15),
(28, 'fruits = [\"apple\", \"banana\", \"cherry\"]\nfor x in fruits:\n    print(x)\n', 'Print each fruit in a fruit list', 1),
(29, 'i = 1\r\nwhile i < 6:\r\n  print(i)\r\n  if i == 3:\r\n    break\r\n  i += 1', 'With the break statement we can stop the loop even if the while condition is true. Exit the loop when i is 3', 16),
(30, 'i = 0\r\nwhile i < 6:\r\n  i += 1 \r\n  if i == 3:\r\n    continue\r\n  print(i)', 'With the continue statement we can stop the current iteration, and continue with the next. Continue to the next iteration if i is 3', 17),
(31, 'thislist = [\"apple\", \"banana\", \"cherry\"]\nprint(thislist)', 'A list is a collection which is ordered and changeable. In Python lists are written with square brackets', 18),
(32, 'thislist = [\"apple\", \"banana\", \"cherry\"]\r\nprint(thislist[1])\r\n', 'You access the list items by referring to the index number. Print the second item of the list:', 19),
(33, 'thislist = [\"apple\", \"banana\", \"cherry\"]\r\nthislist[1] = \"blackcurrant\"\r\nprint(thislist)\r\n', 'To change the value of a specific item, refer to the index number:', 20),
(34, 'thislist = [\"apple\", \"banana\", \"cherry\"]\nfor x in thislist:\n  print(x)', 'You can loop through the list items by using a for loop. Print all items in the list, one by one:\r\n', 21),
(35, 'thislist = [\"apple\", \"banana\", \"cherry\"]\nif \"apple\" in thislist:\n  print(\"Yes, \'apple\' is in the fruits list\")', 'To determine if a specified item is present in a list use the in keyword. Check if \"apple\" is present in the list:', 22),
(36, 'thislist = [\"apple\", \"banana\", \"cherry\"]\r\nprint(len(thislist))\r\n', 'To determine how many items a list has, use the len() method. Print the number of items in the list:\r\n', 23);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_chapter`
--

CREATE TABLE `exercise_chapter` (
  `exchp_id` int(3) NOT NULL,
  `exchp_question` varchar(255) NOT NULL,
  `exchp_opt1` varchar(255) NOT NULL,
  `exchp_opt2` varchar(255) NOT NULL,
  `exchp_opt3` varchar(255) NOT NULL,
  `exchp_opt4` varchar(255) NOT NULL,
  `exchp_answer` varchar(1) NOT NULL,
  `chp_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise_chapter`
--

INSERT INTO `exercise_chapter` (`exchp_id`, `exchp_question`, `exchp_opt1`, `exchp_opt2`, `exchp_opt3`, `exchp_opt4`, `exchp_answer`, `chp_id`) VALUES
(7, 'Int, or integer, is a whole number, positive or negative, without decimals, of unlimited length. ', 'x = 1 y = 35656222554887711 z = -3255522 print(type(x)) print(type(y)) print(type(z))', 'x = 1.10 y = 1.0 z = -35.59 print(type(x)) print(type(y)) print(type(z))', 'x = 3+5j y = 5j z = -5j print(type(x)) print(type(y)) print(type(z))', 'x = 4+5j y = 4j z = -5j print(type(x)) print(type(y)) print(type(z))', 'A', 6),
(8, 'Float, or \"floating point number\" is a number, positive or negative, containing one or more decimals.', 'x = 1 y = 35656222554887711 z = -3255522 print(type(x)) print(type(y)) print(type(z))', 'x = 1.10 y = 1.0 z = -35.59 print(type(x)) print(type(y)) print(type(z))', 'x = 3+5j y = 5j z = -5j print(type(x)) print(type(y)) print(type(z))', 'Not D', 'B', 6),
(9, 'Complex numbers are written with a \"j\" as the imaginary part.', 'x = 1 y = 35656222554887711 z = -3255522 print(type(x)) print(type(y)) print(type(z))', 'x = 1.10 y = 1.0 z = -35.59 print(type(x)) print(type(y)) print(type(z))', 'x = 3+5j y = 5j z = -5j print(type(x)) print(type(y)) print(type(z))', 'Not D', 'C', 6),
(10, 'Float can also be scientific numbers with an \"e\" to indicate the power of 10.', 'x = 1 y = 35656222554887711 z = -3255522 print(type(x)) print(type(y)) print(type(z))', 'x = 1.10 y = 1.0 z = -35.59 print(type(x)) print(type(y)) print(type(z))', 'x = 3+5j y = 5j z = -5j print(type(x)) print(type(y)) print(type(z))', 'x = 35e3 y = 12E4 z = -87.7e100 print(type(x)) print(type(y)) print(type(z))', 'D', 6),
(11, 'To verify the type of any object in Python, use the type() function', 'print(type(x)) print(type(y)) print(type(z))', 'print(type x) print(type y) print(type z)', 'print(type x) print(type y) print(type z)', 'Not D', 'A', 6),
(12, 'Print i as long as i is less than 6', 'i = 1      while i < 6; print(i) i += 1', 'i = 3      while i < 6; print(i) i += 1', 'i = 1      while i < 4; print(i) i += 1', 'i = 1      while i < 6; print(i) i += 2', 'A', 1),
(13, 'Stop the loop if i is 3', 'i = 1     while i < 3;  if i == 3; break i += 1', 'i = 1     while i < 10;  if i == 5; break i += 1', 'i = 1     while i < 6;  if i == 3; break i += 1', 'i = 1     while i < 6;  if i == 5; break i += 3', 'C', 1),
(14, 'Loop through the items in the fruits list. ', 'fruits = [\"apple\" \"banana\" \"cherry\"]      for x in fruits; print(x)', 'fruits = \"apple\", \"banana\", \"cherry\"      for x in fruits; print(x)', 'fruits = [apple, banana, cherry]      for x in fruits; print(x)', 'fruits = [\"apple\", \"banana\", \"cherry\"]      for x in fruits; print(x)', 'D', 1),
(15, 'In the loop, when the item value is \"banana\", jump directly to the next item. \r\n', 'fruits = [\"apple\", \"banana\", \"cherry\"]      for x in fruits; if x == \"apple\";     		continue print(x)', 'fruits = [\"apple\", \"banana\", \"cherry\"]      for x in fruits; if x == \"banana\";     		continue print(x)', 'fruits = [\"apple\", \"banana\", \"cherry\"]      for x in fruits; if y == \"banana\";     		continue print(x)', 'fruits = [\"apple\", \"banana\", \"cherry\"]      for x in fruits; if x == \"banana\";     		break print(x)', 'B', 1),
(16, 'Use the range function to loop through a code set 6 times. ', 'for x in range(6); print(x)', 'for x in range(4); print(x)', 'for x in range(4); print(y)', 'for y in range(4); print(y)', 'A', 1),
(17, 'In Python, a variable must be declared before it is assigned a value', 'True', 'False', 'Hmmm', 'In Between', 'B', 7),
(18, 'Which of the following statements assigns the value 100 to the variable x in Python', 'x = 100', 'x := 100', 'let x = 100', 'x << 100', 'A', 7),
(19, 'In Python, a variable may be assigned a value of one type, and then later assigned a value of a different type', 'False', 'True', 'Hahahaha', 'Idk', 'B', 7),
(20, 'Following execution of these statements, Python has created how many objects and how many references? ', 'One object, two references', 'Two objects, two references', 'One object, one reference', 'Two objects, one reference', 'A', 7),
(21, 'What Python built-in function returns the unique number assigned to an object', 'ref()', 'id()', 'identity()', 'refnum()', 'B', 7),
(22, '1.	Print \"Hello World\" if a is greater than b.\r\na = 50\r\nb = 10\r\n __ a __  b __\r\n  print(\"Hello World\")\r\n', 'a', 'a', 'a', 'a = 50 b = 10  if a >  b :   print(\"Hello World\")', 'D', 8),
(23, '1.	Print \"Hello World\" if a is not equal to b.\r\na = 50\r\nb = 10\r\n __ a __  b __\r\n  print(\"Hello World\")\r\n', 'a = 50 b = 10  if a !=  b ;   print(\"Hello World\")', 'a = 50 b = 10  if a !=  b :   print(\"Hello World\")', 'a = 50 b = 10  if a =!  b :   print(\"Hello World\")', 'a = 50 b = 10  if a =!  b ;   print(\"Hello World\")', 'B', 8),
(24, '2.	Print \"Yes\" if a is equal to b, otherwise print \"No\".\r\na = 50\r\nb = 10\r\n__ a __ b __\r\n  print(\"Yes\")\r\n____\r\n  print(\"No\")\r\n', 'a', 'b', 'a = 50 b = 10 if a == b :   print(\"Yes\") else :   print(\"No\")', 'd', 'C', 8),
(25, '3.	Print \"1\" if a is equal to b, print \"2\" if a is greater than b, otherwise print \"3\".\r\na = 50\r\nb = 10\r\n__ a __ b __\r\n  print(\"1\")\r\n __ a __ b __\r\n  print(\"2\")\r\n_________\r\n  print(\"3\")\r\n', 'a = 50 b = 10 if a == b :   print(\"1\")  elif a > b :   print(\"2\") else:   print(\"3\")', 'b', 'c', 'd', 'A', 8),
(26, '4.	Print \"Hello\" if a is equal to b, and c is equal to d.\r\nif a == b ___ c == d:\r\n  print(\"Hello\")\r\n', 'if a == b and c == d:   print(\"Hello\")', 'b', 'c', 'd', 'A', 8),
(27, 'Is this a string that like a rope?', 'Yes', 'Nope', 'Yes', 'Yes', 'B', 3),
(28, 'b', '1', '2', '3', '4', 'B', 10),
(29, 'c', '1', '2', '3', '4', 'C', 10),
(30, 'd', '1', '2', '3', '4', 'D', 10),
(31, 'a', '1', '2', '3', '4', 'A', 10);

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `pp_id` int(3) NOT NULL,
  `pp_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`pp_id`, `pp_name`) VALUES
(1, 'pic1.png'),
(2, 'pic2.png'),
(3, 'pic3.png'),
(4, 'pic4.png'),
(5, 'pic5.png'),
(6, 'pic6.png'),
(7, 'pic7.png'),
(8, 'pic8.png'),
(9, 'pic9.png'),
(10, 'pic10.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_chapter`
--

CREATE TABLE `sub_chapter` (
  `subchp_id` int(11) NOT NULL,
  `subchp_name` varchar(100) NOT NULL,
  `chp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_chapter`
--

INSERT INTO `sub_chapter` (`subchp_id`, `subchp_name`, `chp_id`) VALUES
(1, 'The \"for\" loop', 1),
(2, 'The \"while\" loop', 1),
(3, 'String Literals', 3),
(4, 'Comment - Line String Input', 3),
(6, 'Integers', 6),
(7, 'Float', 6),
(8, 'Complex', 6),
(9, 'Creating Variables', 7),
(10, 'Output Variables', 7),
(11, 'Python Arithmetic Operators', 4),
(12, 'If statement', 8),
(13, 'Elif', 8),
(14, 'Else', 8),
(15, 'Short Hand If â€¦ Else', 8),
(16, 'The break Statement', 1),
(17, 'The continue Statement', 1),
(18, 'Create a List', 9),
(19, 'Access Items', 9),
(20, 'Change Item Value', 9),
(21, 'Loop Through a List', 9),
(22, 'Check if Item Exists', 9),
(23, 'List Length', 9),
(24, 'bleh 1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tier_progress`
--

CREATE TABLE `tier_progress` (
  `tp_id` int(3) NOT NULL,
  `tp_tier` varchar(25) NOT NULL,
  `tp_point` int(5) NOT NULL,
  `tp_pic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tier_progress`
--

INSERT INTO `tier_progress` (`tp_id`, `tp_tier`, `tp_point`, `tp_pic`) VALUES
(1, 'Bronze', 500, 'Bronze.png'),
(2, 'Silver', 1000, 'Silver.png'),
(3, 'Gold', 1500, 'Gold.png'),
(4, 'Platinum', 2000, 'Platinum.png'),
(5, 'Diamond', 2500, 'Diamond.png'),
(6, 'Crown', 3000, 'Crown.png'),
(7, 'Ace', 3500, 'Ace.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_usrname` varchar(50) NOT NULL,
  `user_passw` varchar(10) NOT NULL,
  `pp_id` int(3) NOT NULL,
  `user_bg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_usrname`, `user_passw`, `pp_id`, `user_bg`) VALUES
(1, 'Rafiq Kosnan', 'rafiqkosnan', 'rafiq', 5, 'defaultuserbg2.jpg'),
(4, 'Wan Nadzmi', 'jemi', 'jemi', 9, 'defaultuserbg1.jpg'),
(5, 'Muhamad Naim', 'naim', 'naim', 2, 'defaultuserbg1.jpg'),
(6, 'hidayah', 'chimie', 'chimie96', 7, 'defaultuserbg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_exercise_mark`
--

CREATE TABLE `user_exercise_mark` (
  `uem_id` int(3) NOT NULL,
  `chp_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `uem_mark` int(2) NOT NULL,
  `uem_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_exercise_mark`
--

INSERT INTO `user_exercise_mark` (`uem_id`, `chp_id`, `user_id`, `uem_mark`, `uem_time`) VALUES
(2, 4, 1, 4, ''),
(3, 4, 1, 4, ''),
(4, 4, 1, 1, ''),
(5, 4, 1, 2, ''),
(6, 6, 1, 0, ''),
(7, 6, 1, 5, ''),
(8, 9, 4, 0, ''),
(9, 6, 4, 1, ''),
(10, 7, 4, 0, ''),
(11, 7, 4, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `up_id` int(3) NOT NULL,
  `chp_id` int(3) NOT NULL,
  `subchp_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_progress`
--

INSERT INTO `user_progress` (`up_id`, `chp_id`, `subchp_id`, `user_id`) VALUES
(27, 4, 11, 1),
(28, 1, 1, 1),
(29, 1, 2, 1),
(30, 1, 16, 1),
(31, 1, 17, 1),
(32, 3, 3, 1),
(33, 3, 4, 1),
(34, 6, 6, 1),
(35, 6, 7, 1),
(36, 6, 8, 1),
(37, 7, 9, 1),
(38, 7, 10, 1),
(39, 8, 12, 1),
(40, 8, 13, 1),
(41, 8, 14, 1),
(42, 8, 15, 1),
(43, 9, 18, 1),
(44, 9, 19, 1),
(45, 9, 20, 1),
(46, 9, 21, 1),
(47, 9, 22, 1),
(48, 9, 23, 1),
(49, 9, 18, 4),
(50, 9, 19, 4),
(51, 9, 20, 4),
(52, 9, 21, 4),
(53, 9, 22, 4),
(54, 9, 23, 4),
(55, 6, 6, 4),
(56, 6, 7, 4),
(57, 6, 8, 4),
(58, 4, 11, 4),
(59, 7, 9, 4),
(60, 7, 10, 4),
(61, 1, 1, 4),
(62, 1, 2, 4),
(63, 1, 16, 4),
(64, 1, 17, 4),
(65, 1, 1, 5),
(66, 1, 2, 5),
(67, 1, 16, 5),
(68, 1, 17, 5),
(69, 4, 11, 5),
(70, 3, 3, 5),
(71, 3, 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chp_id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `exercise_chapter`
--
ALTER TABLE `exercise_chapter`
  ADD PRIMARY KEY (`exchp_id`);

--
-- Indexes for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `sub_chapter`
--
ALTER TABLE `sub_chapter`
  ADD PRIMARY KEY (`subchp_id`);

--
-- Indexes for table `tier_progress`
--
ALTER TABLE `tier_progress`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_exercise_mark`
--
ALTER TABLE `user_exercise_mark`
  ADD PRIMARY KEY (`uem_id`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`up_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `exercise_chapter`
--
ALTER TABLE `exercise_chapter`
  MODIFY `exchp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `pp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_chapter`
--
ALTER TABLE `sub_chapter`
  MODIFY `subchp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tier_progress`
--
ALTER TABLE `tier_progress`
  MODIFY `tp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_exercise_mark`
--
ALTER TABLE `user_exercise_mark`
  MODIFY `uem_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `up_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
