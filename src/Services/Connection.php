<?php

declare(strict_types= 1);

namespace App\Services;

// use Dotenv\Dotenv;
use App\Models\User;
use Exception;

class Connection
{
    /**
     * @var \PDO
     */
    private $connection;

    public function __construct()
    {
        #$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__, 2) . "/.env");
        #$dotenv->load();
        $this->connection = new \PDO("mysql:host=localhost;dbname=database_name","user","password");
    }

    public function getAll(): array
    {
        // List all users
        $sql = "select * from users;";
        $result = $this->connection->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }

    public function add(User $user): bool
    {
        try
        {
            // Add new User
            $sql = "insert into users values ('$user->id', '$user->name', '$user->idade', '$user->email');";

            $result = $this->connection->prepare($sql);

            $result->execute();

            echo "Registro adicionado com sucesso!";

            return true;

        } catch (Exception $e)
        {
            echo $e->getMessage();
            return false;
        }

    }

    public function update(User $user): bool
    {
        try
        {
            // Validate id_user
            $query = "select * from users where id_user = $user->id";
            $consult = $this->connection->prepare($query);
            $consult->execute();

            if ($consult->rowCount() != 0)
            {
                // Update user
                $sql = "update users set nome_user='$user->name', idade_user='$user->idade', email_user='$user->email' where id_user = $user->id";
                $result = $this->connection->prepare($sql);
                $result->execute();
    
                echo "Registro atualizado com sucesso!";
                
                return true;
            }
            else
            {
                throw new Exception("Usuário não localizado!");
            }
            
        } 
        catch (Exception $e)
        {
            echo $e->getMessage();

            return false;
        }
    }


    public function delete(User $user): bool
    {
        try
        {
            // Validate id_user
            $query = "select * from users where id_user = $user->id";
            $consult = $this->connection->prepare($query);
            $consult->execute();

            if ($consult->rowCount() != 0)
            {
                // Delete user
                $sql = "delete from users where id_user = $user->id";
                $result = $this->connection->prepare($sql);
                $result->execute();

                echo "Registro deletado com sucesso!";

                return true;
            }
            else
            {
                throw new Exception("Usuário não localizado!");
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
    }
}