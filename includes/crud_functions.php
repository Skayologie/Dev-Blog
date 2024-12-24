<?php

function get_all_articles($mysqli){

}

function get_category_stats($mysqli){
    $sql = "SELECT * FROM categories";
    $result = $mysqli->query($sql);
    $resultQuery = $result->fetch_all(MYSQLI_ASSOC);
    return ($resultQuery);
}

function get_top_users($mysqli){
    $sql = "SELECT * , COUNT(*) AS article_count , SUM(views) AS viewsAll FROM articles JOIN users ON users.id = articles.author_id GROUP BY author_id ORDER BY articles.views DESC LIMIT 3";
    $result = $mysqli->query($sql);
    $resultQuery = $result->fetch_all(MYSQLI_ASSOC);
    return ($resultQuery);
}

function get_top_articles($mysqli){
    $sql = "select * from articles JOIN users ON users.id = articles.author_id ORDER BY views DESC LIMIT 3";
    $result = $mysqli->query($sql);
    $resultQuery = $result->fetch_all(MYSQLI_ASSOC);
    return ($resultQuery);
}


function getTableCount($mysqli,$table){
    $sql = "SELECT COUNT(*) AS Total FROM $table";
    $result = $mysqli->query($sql);
    $resultQuery = $result->fetch_assoc();
    return $resultQuery["Total"];
}