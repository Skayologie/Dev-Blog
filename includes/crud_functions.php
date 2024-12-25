<?php

function get_all_articles($mysqli){
    // $sql = "SELECT * FROM articles JOIN users ON articles.author_id = users.id";
    // $results = $mysqli->query($sql);
    // return ($results->fetch_assoc());

    $sql = "SELECT * , tags.name AS tag_name FROM articles 
    JOIN users ON articles.author_id = users.id 
    JOIN categories ON categories.id = articles.category_id 
    JOIN article_tags ON article_tags.article_id = articles.id
    JOIN tags ON tags.id = article_tags.tag_id 
    ORDER BY created_at DESC";
    $results = $mysqli->query($sql);
    return ($results->fetch_all(MYSQLI_ASSOC));
}

function get_category_stats($mysqli){
    $sql = "SELECT * , COUNT(*) AS article_count FROM articles JOIN categories ON categories.id = articles.category_id GROUP BY category_id";
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