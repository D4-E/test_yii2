<?php

/**
 * Автор
 *
 * @property string $name
 * @property array $article
 */
class Author
{
    /**
     * Имя автора
     *
     * @var string
     */
    public $name;

    /**
     * Статьи
     *
     * @var array
     */
    private $article = [];

    /**
     * Author constructor.
     * @param $name
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Отдает все статьи
     *
     * @return array
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Дабавляет статью
     *
     * @param Article $article
     */
    public function setArticle(Article $article)
    {
        $this->article[$article->number] = $article;
    }

    /**
     * Удаляет статью у автора
     *
     * @param $number
     */
    public function deleteArticle($number) {
        unset($this->article[$number]);
    }
}

/**
 * Статья
 *
 * @property int $number
 * @property string $name
 * @property string $date
 * @property Author $author
 */
class Article
{
    /**
     * @var int
     */
    public $number;

    /**
     * Наименование статьи
     *
     * @var string
     */
    public $name;

    /**
     * Дата публикации
     *
     * @var string
     */
    public $date;

    /**
     * Автор
     *
     * @var Author
     */
    private $author;

    /**
     * Article constructor.
     * @param string $name
     * @param string $date
     * @param Author $author
     */
    public function __construct(string $name, string $date, Author $author) {
        $number = rand();

        $this->number = $number;
        $this->name = $name;
        $this->date = $date;
        $this->author = $author;

        $author->setArticle($this);
    }

    /**
     * Отдает автора
     *
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Меняет статье автора, а также удаляет статью у предыдущего
     *
     * @param Author $author
     */
    public function setAuthor($author)
    {
        $this->author->deleteArticle($this->number);
        $this->author = $author;
        $author->setArticle($this);
    }
}

$a = new Author('Олег');

$art1 = new Article('AAA', '12-01-2020', $a);
$art2 = new Article('BBB', '07-03-2020', $a);

$art_list = $a->getArticle();

$aut = $art1->getAuthor();

$b = new Author('Дима');

$art1->setAuthor($b);

/* End test 4*/
/* Start test 5*/

/**
 * Выполняет запрос к БД и формирует массив данных
 *
 * @param $user_ids
 * @return array
 */
function load_users_data($user_ids) {
    $data = [];

    $db = mysqli_connect("localhost", "root", "", "test_yii2");
    if (!empty($db)) {
        $user_ids = explode(',', $user_ids);
        foreach ($user_ids as $user_id) {
            if ($sql = mysqli_query($db, "SELECT * FROM tbl_user WHERE id = {$user_id}")) {
                $obj = $sql->fetch_object();
                $data[$user_id] = $obj->first_name;
            }
        }
        mysqli_close($db);
    }

    return $data;
}

if (!empty($_GET['user_ids'])) {
    $data = load_users_data($_GET['user_ids']);
    foreach ($data as $user_id => $name) {
        echo "<a href=\"/show_user.php?id=$user_id\">$name</a><br/>";
    }
}
?>