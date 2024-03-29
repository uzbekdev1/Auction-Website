<?php
/*session_start();

if(!isset($_SESSION['userID'])){ //if login in session is not set
    header("Location: youmustbeloggedin.php");
}

require_once '/u/ssp0929/SQLDB-login/openDatabase.php';

$auctionQuery = $database->prepare(<<<'SQL'
    SELECT
        AUCTION.ITEM_CAPTION,
        AUCTION.AUCTION_ID as AID,
        CONCAT(PERSON.FORENAME, ' ', PERSON.SURNAME) AS SELLER,
        AUCTION.CLOSE_TIME,
        AUCTION.ITEM_PHOTO,
        MAX(BID.AMOUNT) as BIDAMOUNT
    FROM
        AUCTION
    JOIN
        PERSON ON AUCTION.SELLER = PERSON.PERSON_ID
    JOIN
        BID ON AUCTION.AUCTION_ID = BID.AUCTION
    WHERE
        AUCTION.STATUS = 1
    GROUP BY
        BID.AUCTION;

SQL
);

$auctionQuery->bindValue(':id', $auctionId, PDO::PARAM_INT);
$auctionQuery->execute();

*/?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Acme Auctions</title>
    <meta charset="utf-8"/>
    <link rel="icon" href="favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
<div id="header">
    <img src="acmeauctionslogo.png" alt="Acme Auctions Logo" height="74" width="399"/>
</div>

<div id="nav">
    <a href="indexloggedin.php">Home</a>
    <a href="bid.php">Bid</a>
    <a href="list.php">List</a>
</div>

<div id="browsenav">
    <a href="bidrecent.php">Recent</a>
    <a href="bidpopular.php">Popular</a>
    <a href="bidendingsoonest.php">Ending Soonest</a>
</div>

<div id="content">
    <div class="card">
        <img src="https://i.vimeocdn.com/portrait/58832_300x300" alt="Photo Error"/>
        <dfn>This is a test caption</dfn>
        <ul>
            <li>Seller: Test1</li>
            <li>Current Bid: $5</li>
            <li>Close Time: 12-12-2018</li>
        </ul>
        <form action="bidonthislisting.php" method="get">
            <input type="hidden" name="id" value="<?= htmlspecialchars($auction['AID']) ?>" />
            <input type="submit" value = "view listing"/>
        </form>
    </div>
    <div class="card">
        <img src="https://i.vimeocdn.com/portrait/58832_300x300" alt="Photo Error"/>
        <dfn>This is a test caption</dfn>
        <ul>
            <li>Seller: Test1</li>
            <li>Current Bid: $5</li>
            <li>Close Time: 12-12-2018</li>
        </ul>
        <form action="bidonthislisting.php" method="get">
            <input type="hidden" name="id" value="<?= htmlspecialchars($auction['AID']) ?>" />
            <input type="submit" value = "view listing"/>
        </form>
    </div>
    <div class="card">
        <img src="https://i.vimeocdn.com/portrait/58832_300x300" alt="Photo Error"/>
        <dfn>This is a test caption</dfn>
        <ul>
            <li>Seller: Test1</li>
            <li>Current Bid: $5</li>
            <li>Close Time: 12-12-2018</li>
        </ul>
        <form action="bidonthislisting.php" method="get">
            <input type="hidden" name="id" value="<?= htmlspecialchars($auction['AID']) ?>" />
            <input type="submit" value = "view listing"/>
        </form>
    </div>
    <div class="card">
        <img src="https://i.vimeocdn.com/portrait/58832_300x300" alt="Photo Error"/>
        <dfn>This is a test caption</dfn>
        <ul>
            <li>Seller: Test1</li>
            <li>Current Bid: $5</li>
            <li>Close Time: 12-12-2018</li>
        </ul>
        <form action="bidonthislisting.php" method="get">
            <input type="hidden" name="id" value="<?= htmlspecialchars($auction['AID']) ?>" />
            <input type="submit" value = "view listing"/>
        </form>
    </div>
    <div class="card">
        <img src="https://i.vimeocdn.com/portrait/58832_300x300" alt="Photo Error"/>
        <dfn><?= htmlspecialchars($auction['ITEM_CAPTION']) ?></dfn>
        <ul>
            <li>Seller: Test1</li>
            <li>Current Bid: $5</li>
            <li>Close Time: 12-12-2018</li>
        </ul>
        <form action="bidonthislisting.php" method="get">
            <input type="hidden" name="id" value="<?= htmlspecialchars($auction['AID']) ?>" />
            <input type="submit" value = "view listing"/>
        </form>
    </div>
    <div class="card">
        <img src="https://i.vimeocdn.com/portrait/58832_300x300" alt="Photo Error"/>
        <dfn><?= htmlspecialchars($auction['ITEM_CAPTION']) ?></dfn>
        <ul>
            <li>Seller: Test1</li>
            <li>Current Bid: $5</li>
            <li>Close Time: 12-12-2018</li>
        </ul>
        <form action="bidonthislisting.php" method="get">
            <input type="hidden" name="id" value="<?= htmlspecialchars($auction['AID']) ?>" />
            <input type="submit" value = "view listing"/>
        </form>
    </div>
</div>

<div id="footer">
    <p>Copyright ©2016, Acme Auctions, Inc. and BevoTech Co.</p>
    <p>Logged in as <?= $_SESSION['username']?>. <a href="index.php">Log out?</a></p>
</div>

</body>
</html>