<?php
// for home page search
define(
    "SELECT_SEARCH_ALL",
    "SELECT title FROM `home_search` WHERE title LIKE ?  UNION
    SELECT author_name FROM `home_search` WHERE author_name LIKE ?  UNION
    SELECT cat_name FROM `home_search` WHERE cat_name LIKE ? "
);
// for details or home page search result
define(
    "SELECT_SEARCH_LOAD_ALL",
    "SELECT * FROM `home_search` WHERE 
    title LIKE ? OR author_name LIKE ? OR cat_name LIKE ?
    GROUP BY title ORDER BY title ASC LIMIT ?,?"
);

// for main book, author , publisher, book pages
define(
    "SELECT_BOOK",
    "SELECT book.book_id, book.title, book.photo, book.rating , author.author_id, author.author_name FROM book_author_rel
    NATURAL JOIN book NATURAL JOIN author GROUP BY book.title
    ORDER BY book.title ASC LIMIT  ?,?"
);
define(
    "SELECT_AUTHOR",
    "SELECT author.author_id, author.author_name , author.author_img, COUNT(book_author_rel.author_id) AS book_no FROM author
    LEFT JOIN book_author_rel ON author.author_id = book_author_rel.author_id
      GROUP BY author.author_id
      ORDER BY author.author_id ASC LIMIT  ?,?"
);
define(
    "SELECT_PUBLISHER",
    "SELECT publisher.pub_id, publisher.pub_name , COUNT(book_publisher_rel.pub_id) AS book_no FROM publisher
    LEFT JOIN book_publisher_rel ON publisher.pub_id = book_publisher_rel.pub_id
      GROUP BY publisher.pub_id
      ORDER BY publisher.pub_id ASC LIMIT  ?,?"
);
define(
    "SELECT_CATEGORY",
    "SELECT categories.cat_id, categories.cat_name, COUNT(book.cat_id) AS book_no FROM categories
    LEFT JOIN book ON categories.cat_id = book.cat_id
      GROUP BY categories.cat_id
      ORDER BY categories.cat_id ASC LIMIT ?,?"
);

// for check if book is  borrow onr not
define(
    "SELECT_BOOK_STATE",
    "SELECT COUNT(book.book_id) as book_state  FROM `part`
    INNER JOIN book ON book.book_id = part.book_id
    INNER JOIN borrow ON part.part_id = borrow.part_id
    WHERE book.book_id = ?"
);

// for search in publisher and author and category
define(
    "SEARCH_CATEGORY",
    "SELECT categories.cat_id, categories.cat_name, COUNT(book.cat_id) AS book_no FROM categories
    LEFT JOIN book ON categories.cat_id = book.cat_id
    WHERE categories.cat_name  LIKE ? GROUP BY categories.cat_id ORDER BY categories.cat_id ASC LIMIT ?,?"
);
define(
    "SEARCH_PUBLISHER",
    "SELECT publisher.pub_id, publisher.pub_name , COUNT(book_publisher_rel.pub_id) AS book_no FROM publisher
    LEFT JOIN book_publisher_rel ON publisher.pub_id = book_publisher_rel.pub_id
    WHERE publisher.pub_name  LIKE ? GROUP BY publisher.pub_id ORDER BY publisher.pub_id ASC LIMIT ?,?"
);
define(
    "SEARCH_AUTHOR",
    "SELECT author.author_id, author.author_name , author.author_img, COUNT(book_author_rel.author_id) AS book_no FROM author
    LEFT JOIN book_author_rel ON author.author_id = book_author_rel.author_id
    WHERE author.author_name  LIKE ? GROUP BY author.author_id ORDER BY author.author_id ASC LIMIT ?,?"
);

// for author and publisher and category section book 
define(
    "SELECT_AUTHOR_BOOK",
    "SELECT book.book_id, book.title, book.photo, book.rating , 
    author.author_id, author.author_name, author.author_description, author.author_img,
    categories.cat_id, categories.cat_name
    FROM book_author_rel
        NATURAL JOIN book
        NATURAL JOIN author
        NATURAL JOIN categories
        WHERE author_id = ? GROUP BY book.title ORDER BY book.title ASC LIMIT ?,?"
);
define(
    "SELECT_CATEGORY_BOOK",
    "SELECT book.book_id, book.title, book.photo, book.rating , 
        author.author_id, author.author_name,
        categories.cat_id, categories.cat_name
        FROM book_author_rel
            NATURAL JOIN book
            NATURAL JOIN author
            NATURAL JOIN categories
            WHERE cat_id = ? GROUP BY book.title ORDER BY book.title ASC LIMIT ?,?"
);
define(
    "SELECT_PUBLISHER_BOOK",
    "SELECT book.book_id, book.title, book.photo, book.rating , 
    author.author_id, author.author_name,
    book_publisher_rel.pub_id
    FROM book_publisher_rel
    INNER JOIN book ON book_publisher_rel.book_id = book.book_id
    INNER JOIN book_author_rel ON book.book_id = book_author_rel.book_id
    INNER JOIN author ON book_author_rel.author_id = author.author_id
    WHERE pub_id = ? GROUP BY book.title ORDER BY book.title ASC LIMIT ?,?"
);

// for book, author , publisher, book sections pages detail and breadcrumb
define(
    "SELECT_AUTHOR_INFO",
    "SELECT `author_img`, `author_name`, `author_description` FROM `author` WHERE `author_id` = ?"
);
define(
    "SELECT_PUBLISHER_INFO",
    "SELECT `pub_name`, `establishment_date`, `owner`, `sequential_deposit_no` FROM `publisher` WHERE `pub_id` = ?"
);
define(
    "SELECT_CATEGORY_INFO",
    "SELECT `cat_name` FROM `categories` WHERE `cat_id` = ?"
);

// for book, author , publisher, book delete pages
define(
    "DELETE_AUTHOR",
    "DELETE FROM `author` WHERE `author_id` = ?"
);
define(
    "DELETE_PUBLISHER",
    "DELETE FROM `publisher` WHERE `pub_id` = ?"
);
define(
    "DELETE_CATEGORY",
    "DELETE FROM `categories` WHERE `cat_id` = ?"
);
define(
    "DELETE_BOOK",
    "DELETE FROM `book` WHERE `book_id` = ?"
);
// for book rating
define(
    "BOOK_RATING",
    "UPDATE `book` SET `rating`= ? WHERE `book_id` = ?"
);

//Mohammed Pages
//login page
define(
    "USER_CHECK_LOGIN",
    "SELECT user_id, user_email ,user_password from user where user_email = ? 
     And user_groupid = 1 Limit 1"
);
// signup page
define(
    "USER_CHECK",
    "SELECT user_email from user where user_email = ? Limit 1"
);

//signup page
define(
    "INSERT_USER",
    "INSERT into user(user_name , user_email ,user_password , user_groupid) VALUES (? , ? ,? , 1 )"
);
//upload page 
define(
    "EDIT_FILE_PATH",
    "UPDATE part SET part_path = ? WHERE part.book_id = ?"
);
// to get pdf path
define(
    "SELECT_FILE_PATH",
    "SELECT part_path FROM part WHERE book_id = ? Limit 1"
);
// to get all book inf
define(
    "SELECT_BOOK_INFO",
    "SELECT book.* ,categories.cat_name ,author.author_id ,author.author_name ,book_publisher_rel.pub_id 
    ,publisher.pub_name as pub_name  ,language.lang_name  
    FROM book_author_rel
    INNER JOIN book ON book_author_rel.book_id = book.book_id
    INNER JOIN categories ON book.cat_id = categories.cat_id
    INNER JOIN author ON book_author_rel.author_id = author.author_id
    INNER JOIN book_publisher_rel ON book_publisher_rel.book_id =book_author_rel.book_id
    INNER JOIN publisher ON book_publisher_rel.pub_id =publisher.pub_id
    INNER JOIN lang_book_rel ON lang_book_rel.book_id = book.book_id
    INNER JOIN language ON lang_book_rel.lang_id =language.lang_id 
    WHERE book_author_rel.book_id = ?    "
);
// to add category
define(
    "ADD_CATEGORY",
    "INSERT INTO categories(cat_name) VALUES(?)"
);