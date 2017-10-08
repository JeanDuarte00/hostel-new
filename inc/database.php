<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() 
{
    try 
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;
    } 
    catch (Exception $e)
    {
        echo $e->getMessage();
        return null;
    }
}

function close_database($conn)
{
    try
    {
        mysqli_close($conn);
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

function find( $table = null, $id = null )
{
    $database = open_database();
    $found = null;
    
    try
    {
        if( $id )
        {
            $sql = "SELECT * FROM " . $table . " WHERE id = ".$id;
            $result = $database->query($sql);
            
            
            if($result->num_rows > 0)
            {
                $found = $result->fetch_assoc();
            }
        }
        else
        {
            $sql = "SELECT * FROM ". $table;
            $result = $database->query($sql);
            
            if($result->num_rows > 0)
            {
                $found = $result->fetch_all(MYSQLI_ASSOC);
                
            }
        }
    }
    catch (Exception $e)
    {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    
    close_database($database);
    return $found;
}

function find_with_sql($sql)
{
    $database = open_database();

    $found = null;
    try
    {
        
        $result = $database->query($sql);

        if($result->num_rows > 0)
        {
            $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    catch(Exception $e)
    {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);

    return $found;

}

function find_all( $table )
{
    return find($table);
}

function save( $table = null, $customer = null)
{
    $database = open_database();

    $columns = null;
    $values = null;

    foreach($customer as $key => $value)
    {
        $columns .= trim($key, "'") . ',';
        $values .= "'$value',";
    }

    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');

    $sql = "INSERT INTO ". $table . "($columns)" . " VALUES " . "($values);";
    
    try
    {
        $database->query($sql);

        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
    }
    catch(Exception $e)
    {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = "danger";
    }

    
    close_database($database);
}

function update($table = null, $id = 0, $data = null)
{
    $database = open_database();

    $items = null;

    foreach($data as $key => $value)
    {
        $items .= trim($key, "'") . "='$value',";
    }

    $items = rtrim($items, ',');

    $sql = "UPDATE ".$table;
    $sql .= " SET $items";
    $sql .= " WHERE id=".$id.";";

    try
    {
        $database->query($sql);

        $_SESSION['message'] = "Registro atualizado com sucesso.";
        $_SESSION['type'] = "succcess";
    }
    catch(Exception $e)
    {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);

}

function delete($table = null, $id = 0)
{
    $database = open_database();

    $sql = "DELETE FROM " . $table . " WHERE id = " . $id;

    try
    {
        $database->query($sql);

        $_SESSION['message'] = "Registro excluído com sucesso";
        $_SESSION['type'] = "success";
    }
    catch(Exception $e)
    {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}