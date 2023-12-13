<?php

include("conn.php");


class RoleConn extends Connection
{
    public function getRoleWithGaji()
    {
        $sql = "SELECT
                b.id as 'id', b.nama as 'nama', g.pokok as 'gaji'
                FROM bagian b
                LEFT JOIN gaji g ON b.id = g.role
                ORDER BY b.id";
        return $this->perform($sql);
    }


    public function getgajiFromRole($id)
    {
        $sql = "SELECT * FROM gaji WHERE role=" . $id;
        return $this->perform($sql);
    }

    public function createOrUpdateGajiFromRole($id, $pokok)
    {
        $result = $this->getgajiFromRole($id);
        $gaji_row = mysqli_fetch_assoc($result);
        if ($gaji_row == null) {
            $sql = "INSERT INTO gaji (role, pokok)
                    VALUES
                    ({$id},{$pokok})";
        } else {
            $sql = "UPDATE gaji SET pokok = {$pokok}
                    WHERE role=" . $id;
        }
        $this->perform($sql);
    }


    public function getLastEntry()
    {
        $sql = "SELECT * FROM bagian b ORDER BY id DESC limit 1;";
        $result = $this->perform($sql);

        return mysqli_fetch_assoc($result);
    }

    public function getRole()
    {
        $sql = "SELECT 
                FROM bagian b";
        return $this->perform($sql);
    }

    public function updateRolebyID($id, $data)
    {
        $this->createOrUpdateGajiFromRole($id, $data["gaji"]);

        $sql = "UPDATE bagian
                SET nama = \"{$data["nama"]}\"
                where id=" . $id;
        $this->perform($sql);
        return true;
    }

    public function deleteGajiWithId($id)
    {
        $sql = "DELETE 
                    FROM gaji
                    WHERE role=" . $id;
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
                (\"{$data["nama"]}\")
                ";
        $this->perform($sql);

        $row = $this->getLastEntry();

        $this->createOrUpdateGajiFromRole($row["id"], $data["gaji"]);
    }



    public function getOne($id)
    {

        $sql = "SELECT b.nama, g.pokok
                FROM bagian b
                LEFT JOIN gaji g 
                ON b.id=g.role 
                where  b.id=" . $id;
        $result = $this->perform($sql);

        $row = $result->fetch_assoc();

        return $row;
    }
}
