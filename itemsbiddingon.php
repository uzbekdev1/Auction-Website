<?php
/*session_start();

if(!isset($_SESSION['userID'])){ //if login in session is not set
    header("Location: youmustbeloggedin.php");
}

require_once '/u/ssp0929/SQLDB-login/openDatabase.php';

$auctionQuery = $database->prepare(<<<'SQL'
    SELECT
        ITEM_CATEGORY.NAME as ITEM_CATEGORY,
        AUCTION_STATUS.NAME as STATUS,
        AUCTION.ITEM_CAPTION,
        AUCTION.AUCTION_ID as AID,
        CONCAT(PERSON.FORENAME, ' ', PERSON.SURNAME) AS SELLER,
        AUCTION.OPEN_TIME,
        AUCTION.CLOSE_TIME,
        AUCTION.ITEM_PHOTO,
        MAX(BID.AMOUNT) as BIDAMOUNT
    FROM
        AUCTION
    JOIN
        ITEM_CATEGORY ON AUCTION.ITEM_CATEGORY = ITEM_CATEGORY.ITEM_CATEGORY_ID
    JOIN
        PERSON ON AUCTION.SELLER = PERSON.PERSON_ID
    JOIN
        AUCTION_STATUS ON AUCTION.STATUS = AUCTION_STATUS.AUCTION_STATUS_ID
    JOIN
        BID ON AUCTION.AUCTION_ID = BID.AUCTION
    WHERE
        BID.BIDDER = :id AND BID.BIDDER != AUCTION.SELLER AND AUCTION.STATUS = 1
    GROUP BY
        BID.AUCTION;
SQL
);

$auctionQuery->bindValue(':id', $_SESSION['userID'], PDO::PARAM_INT);
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

<div id="content">
    <?php
    foreach ($auctionQuery->fetchAll() as $auction) {
        ?>
        <div class="card">
            <img src="showthephoto.php?id=<?= htmlspecialchars($auction['AID']) ?>" alt="Photo Error" />
            <dfn><?= htmlspecialchars($auction['ITEM_CAPTION']) ?></dfn>
            <ul>
                <li>Seller: <?= htmlspecialchars($auction['SELLER']) ?></li>
                <li>Current Bid: $<?= htmlspecialchars($auction['BIDAMOUNT']) ?></li>
                <li>Close Time: <?= htmlspecialchars($auction['CLOSE_TIME']) ?></li>
            </ul>
            <form action="bidonthislisting.php" method="get">
                <input type="hidden" name="id" value="<?= htmlspecialchars($auction['AID']) ?>" />
                <input type="submit" value = "view listing"/>
            </form>
        </div>
        <?php
    }
    $auctionQuery->closeCursor();
    ?>
</div>

<div id="footer">
    <p>Copyright ©2016, Acme Auctions, Inc. and BevoTech Co.</p>
    <p>Logged in as <?= $_SESSION['username']?>. <a href="index.php">Log out?</a></p>
</div>

</body>
</html>