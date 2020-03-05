<?php
namespace app;
use PDO;

class TABLE1 extends Model
{
    public function getProducts()
    {
        $sql = 'SELECT * FROM `TABLE1`';
        $q = $this->db->prepare($sql);
        $q->execute();

        return $q->fetchAll();
    }

    public function getProductByArticle($article)
    {
        $sql = 'SELECT * FROM `TABLE1` WHERE `article`=:article';
        $q = $this->db->prepare($sql);
        $params = [':article' => $article];
        $q->execute($params);

        return $q->fetchAll();
    }

//    delete;update;count

    /**
     * function for changing category id of a product using article
     * @param $article
     * @param $categoryId
     */
    public function changeCategoryIdByArticle($categoryId,$article)               //обновить товару category id
    {
        $sql = 'UPDATE `table1` SET `category_id`=:categoryId WHERE `article`=:article';
        $q = $this->db->prepare($sql);
        $params = [':article' => $article, ':categoryId' => $categoryId];
        $q->execute($params);

    }

    /**
     * @return array
     */
    public function getIdAndCategoryId() // получаем id и category_id
    {
        $sql = 'SELECT `id`,`category_id` FROM `table1` WHERE `category_id`<>0';
        $q = $this->db->prepare($sql);
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByID($id)
    {
        $sql = 'DELETE FROM `table1` WHERE `id`=:id';
        $q = $this->db->prepare($sql);
        $params = [':id' => $id];
        $q->execute($params);
    }
    public function deleteByArticle($article)
    {
        $sql = 'DELETE FROM `table1` WHERE `article`=:article';
        $q = $this->db->prepare($sql);
        $params = [':article' => $article];
        $q->execute($params);
    }
    public function countOfRows()
{
    $sql = 'SELECT COUNT(*) FROM table1';
    $q = $this->db->prepare($sql);
    $q->execute();
    return $q->fetchColumn();
}

    public function getProductsByCategoryId($CategoryId)
    {
        $sql = 'SELECT * FROM `table1` WHERE `category_id`=:categoryid';
        $q = $this->db->prepare($sql);
        $params = [':categoryid' => $CategoryId];
        $q->execute($params);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

}