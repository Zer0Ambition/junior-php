<?php

class BookModel extends Model {

    public function findAll($sortBy = "id", $sortDirection = "DESC") {
        $sql = "
            SELECT books.name, (SELECT NAME FROM authors WHERE books.author_id = id) AS author,
            (SELECT NAME FROM genres WHERE books.genre_id = id) AS genre, description, 
            YEAR(publication_date) AS publication_date, ROUND(price, 0) AS price, image  
            FROM BOOKS
            ORDER BY $sortBy $sortDirection";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();

        return $res;    
    }

    public function getCount() {
        $sql = "SELECT COUNT(*) FROM BOOKS";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();

        return $res;
    }

    public function getAveragePrice() {
        $sql = "SELECT ROUND(AVG(price), 0) FROM BOOKS";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();

        return $res;

    }

    public function getOldestPublicationYear() {
        $sql = "SELECT MIN(YEAR(publication_date)) FROM BOOKS";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();

        return $res;

    }

    public function getNewestPublicationYear() {
        $sql = "SELECT MAX(YEAR(publication_date)) FROM BOOKS";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();

        return $res;

    }
}