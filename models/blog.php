<?php

namespace blog\models;

use \blog\module\Convert;
use \blog\module\CryptoLib;

Class Blog
{
    use CryptoLib;
    use Convert;

    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function addPost($post): bool
    {
        $header = $post['header'];
        $article = $this->encrypt(
                            $post['key'],
                            $this->html2text(
                                nl2br(
                                    $post['article'], false
                                )
                            )
        );
        $keywords = $post['keywords'];

        $this->db->beginTransaction();
        try {
            # вставляем статью, получаем id, вставляем ключевые поля
            $query = 'insert into articles (header, article) values (:header, :article)';
            $id_article = $this
                ->db
                ->insertData($query, [
                    'header' => $header,
                    'article' => $article,
                ]);

            if ($id_article === -1) {
                throw new \Exception('Ошибка вставки записи в блог');
            }

            if (!$this->addKey($id_article, $keywords)) {
                throw new \Exception('Ошибка добавления ключевых слов');
            }
        } catch (\Exception $e) {
            $this->db->rollBack();
            return 0;
        }

        $this->db->commit();
        return $id_article;
    }

    public function addKey($id_article, $keywords): bool
    {
        return false;
    }
}

