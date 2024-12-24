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
    $sql = "SELECT * FROM users ";
    $result = $mysqli->query($sql);
    $resultQuery = $result->fetch_all(MYSQLI_ASSOC);
    return ($resultQuery);
}

function get_top_articles($mysqli){
    
}


function getTableCount($mysqli,$table){
    $sql = "SELECT COUNT(*) AS Total FROM $table";
    $result = $mysqli->query($sql);
    $resultQuery = $result->fetch_assoc();
    return $resultQuery["Total"];
}