<?php
require_once("../../common_files/php/database.php");
$json_data=json_decode($_POST['json_data']);
$category = $_POST['category'];
$length=count($json_data);

$message = "";
$select_category_table = "SELECT * FROM brands";

if($db->query($select_category_table))
{
    for ($i=0;$i<$length;$i++)
        {
            $store_value = "INSERT INTO brands(category_name,brands) VALUES('$category','$json_data[$i]')";
            if($db->query($store_value))
            {
                if(mkdir("../../stocks/".$category.'/'.$json_data[$i])){
                $message= "Done";
                }
            }
            else
            {
                $message= "Failed to store data in table";
            }
        }
        echo $message;
}
else
{
    $create_table = "CREATE TABLE brands(
        id INT(11) NOT NULL AUTO_INCREMENT,
        brands VARCHAR(500),
        category_name VARCHAR(500),
        PRIMARY KEY(id)
    )";
    if($db->query($create_table))
    {
        for ($i=0;$i<$length;$i++)
        {
            $store_value = "INSERT INTO brands(category_name,brands) VALUES('$category','$json_data[$i]')";
            if($db->query($store_value))
            {
                if(mkdir("../../stocks/".$category.'/'.$json_data[$i])){
                $message="Done";
                }
            }
            else
            {
                $message= "Failed to store data in table";
            }
        }
        echo $message;
    }
    else
    {
        echo "unable to  create table";
    }
}

?>