<?php

namespace blog\models;

Class Blog
{
    use \blog\module\CryptoLib;
    use \blog\module\Convert;

    private $db;
    private $header = '';
    private $article = '';
    private $keywords = [];

    function __construct($db)
    {
        $this->db = $db;
    }

    function addPost($post)
    {
        $this->header = $post['header'];
        $this->article = $this->encrypt(
                            $post['key'],
                            $this->html2text(
                                nl2br(
                                    $post['article'], false
                                )
                            )
        );
        $this->keywords = $post['keywords'];

        $this->db->beginTransaction();

        # вставляем статью, получаем id, вставляем ключевые поля
        $query = 'insert into articles (header, article) values (:header, :article)';
        $id_article = $this
            ->db
            ->insertData($query, [
                'header'    => $this->header,
                'article'   => $this->article,
            ]);

        if ($id_article != -1) {
            $error = false;

            if (!$this->addKey($id_article, $post['keywords'])) {
                $error = true;
            }
        } else {
            $error = true;
        }

        if ($error) {
            $this->db->rollBack();

            return false;
        }

        $this->db->commit();

        return $id_article;
    }
}

