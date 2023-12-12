<?php

class Connection
{

    private $servername = "localhost:3306";
    private $username = "root";
    private $password = "";
    private $db = "rm_rumah_kenyang";

    protected $conn;

    protected function connect()
    {
        // echo isset($this->conn) ? "EXIST" : "NOT EXIST" ;
        $this->conn = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->db
        );

        // echo isset($this->conn) ? "EXIST" : "NOT EXIST";
        // die();
        if ($this->conn->connect_error) {
            die("connection failed" . $this->conn->connect_error);
        }
    }

    protected function disconnect()
    {
        $this->conn->close();
    }

    protected function perform($sql)
    {
        $this->connect();
        $result = $this->conn->query($sql);
        $this->disconnect();
        return $result;
    }
}

class KaryawanConn extends Connection
{
    public function getKaryawanWithRole()
    {
        $sql = "SELECT 
                k.id as 'id' , 
                k.nama , k.umur , b.nama 
                as 'role'  
                FROM karyawan k 
                JOIN bagian b ON k.`role` = b.id 
                ORDER BY k.id";

        return $this->perform($sql);
    }

    public function deleteKaryawanWithId($id)
    {
        $sql = "DELETE 
                    FROM karyawan 
                    WHERE id=" . $id;
        $this->perform($sql);
        return true;
    }

    public function createKarwayan($data)
    {
        $sql = "INSERT INTO karyawan
                (nama, umur, role)
                VALUES
                (\"{$data["nama"]}\", {$data["umur"]}, {$data["role"]})
                ";
        // echo $sql;
        // die();
        $this->perform($sql);
    }
}

class RoleConn extends Connection
{

    public function getRoleWithGaji()
    {
        $sql = "SELECT
                b.id as 'id', b.nama as 'nama', g.pokok as 'gaji'
                FROM bagian b
                JOIN gaji g ON b.id = g.role
                ORDER BY b.id";
        return $this->perform($sql);
    }

    public function updateRolebyID($id, $data)
    {
        $sql = "UPDATE bagian
                SET nama = \"{$data["nama"]}\"
                UPDATE gaji
                SET pokok = {$data["gaji"]}
                FROM bagian JOIN gaji
                ON bagian.id = gaji.role
                where id=" . $id;
                
        $this->perform($sql);
        return true;
    }

    public function deleteRoleWithId($id)
    {
        $sql = "DELETE 
                    FROM bagian
                    WHERE id=" . $id;
        $this->perform($sql);
        return true;
    }

    public function createRole($data)
    {
        $sql = "INSERT INTO bagian
                (nama)
                VALUES
                (\"{$data["nama"]}\");
                INSERT INTO gaji
                (pokok)
                VALUES
                ({$data["gaji"]});
                ";
        // echo $sql;
        // die();
        $this->perform($sql);
    }

    public function getOne($id){

        $sql = "SELECT nama FROM bagian where  id=". $id;
        $result = $this->perform($sql);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }
}


class MenuConn extends Connection
{

    public function getMenu()
    {
        $sql = "SELECT

                * FROM menu";
        return $this->perform($sql);
    }

    public function updateMenubyID($id, $data)
    {
        $sql = "UPDATE menu
                SET nama = \"{$data["nama"]}\", harga = {$data["harga"]}
                where id=" . $id;
        $this->perform($sql);
        return true;
    }

    public function deleteMenuWithId($id)
    {
        $sql = "DELETE 
                    FROM menu
                    WHERE id=" . $id;
        $this->perform($sql);
        return true;
    }

    public function createMenu($data)
    {
        $sql = "INSERT INTO menu
                (nama, harga)
                VALUES
                (\"{$data["nama"]}\", {$data["harga"]})
                ";
        $this->perform($sql);
    }

    public function getOneMenu($id){

        $sql = "SELECT * FROM menu where  id=". $id;
        $result = $this->perform($sql);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }
}


class PelangganConn extends Connection
{

    public function getPelanggan()
    {
        $sql = "SELECT

                * FROM pelanggan";
        return $this->perform($sql);
    }

    public function updatePelangganbyID($id, $data)
    {
        $sql = "UPDATE pelanggan
                SET nama = \"{$data["nama"]}\"
                where id=" . $id;
        $this->perform($sql);
        return true;
    }

    public function deletePelangganWithId($id)
    {
        $sql = "DELETE 
                    FROM pelanggan
                    WHERE id=" . $id;
        $this->perform($sql);
        return true;
    }

    public function createPelanggan($data)
    {
        $sql = "INSERT INTO pelanggan
                (nama)
                VALUES
                (\"{$data["nama"]}\")
                ";
        $this->perform($sql);
    }

    public function getOnePelanggan($id){

        $sql = "SELECT nama FROM pelanggan where  id=". $id;
        $result = $this->perform($sql);
        
        $row = $result->fetch_assoc();
        
        return $row;
    }
}