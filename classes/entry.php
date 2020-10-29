<?php
error_reporting(E_ERROR | E_WARNING);
class Entry
{
    private $id;
    private $day;
    private $day2;
    private $month;
    private $month2;
    private $year;
    private $upload;
    private $author;
    private $views;
    private $title;
    private $title2;
    private $excerpt;
    private $excerpt2;
    private $content;
    private $content2;
    private $file;
    private $file2;
    private $file3;
    private $file4;
    private $dbh;
    private $error;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=00252698_rrm', 'root', '');
    }

    public function createNew($author, $views, $day, $day2, $month, $month2, $year, $upload, $title, $title2, $excerpt, $excerpt2, $content, $content2, $file, $file2, $file3, $file4)
    {
        $this->setByParams(-1, $day, $day2, $month, $month2, $year, $upload, $author, $views, $title, $title2, $excerpt, $excerpt2, $content, $content2, $file, $file2, $file3, $file4);
    }

    public function createNewFromPOST($post)
    {
        $this->createNew($post['entry_author'], $post['entry_views'], $post['entry_day'], $post['entry_day_en'], $post['entry_month'], $post['entry_month_en'], $post['entry_year'], $post['entry_upload_en'], $post['entry_title'], $post['entry_title_en'], $post['entry_excerpt'], $post['entry_excerpt_en'], $post['entry_content'], $post['entry_content_en'], $post['entry_file'], $post['entry_file2'], $post['entry_file3'], $post['entry_file4']);
    }

    public function setByParams($id, $day, $day2, $month, $month2, $year, $upload, $author, $views, $title, $title2, $excerpt, $excerpt2, $content, $content2, $file, $file2, $file3, $file4)
    {
        if (strlen($author) == 0) {
            $this->id = -1;
        } else {
            $this->id      = $id;
            $this->author  = $author;
            $this->views   = $views;
            $this->day     = $day;
            $this->day2     = $day2;
            $this->month   = $month;
            $this->month2   = $month2;
            $this->year    = $year;
            $this->upload   = $upload;
            $this->title   = $title;
            $this->title2   = $title2;
            $this->excerpt = $excerpt;
            $this->excerpt2 = $excerpt2;
            $this->content = $content;
            $this->content2 = $content2;
            $this->file    = $file;
            $this->file2   = $file2;
            $this->file3   = $file3;
            $this->file4   = $file4;
        }
    }

    public function setByRow($row)
    {
        $this->setByParams($row['entry_id'], $row['entry_day'], $row['entry_day_en'], $row['entry_month'], $row['entry_month_en'], $row['entry_year'], $row['entry_upload_en'], $row['entry_author'], $row['entry_views'], $row['entry_title'], $row['entry_title_en'], $row['entry_excerpt'], $row['entry_excerpt_en'], $row['entry_content'], $row['entry_content_en'], $row['entry_file'], $row['entry_file2'], $row['entry_file3'], $row['entry_file4']);
    }

    public function SqlInsertEntry()
    {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        $target_dir    = "uploads/";
        $file_name     = $_FILES['entry_file']['name'];
        $file_tmp_name = $_FILES['entry_file']['tmp_name'];
        $file_name2    = $_FILES['entry_file2']['name'];
        $file_tmp_name2 = $_FILES['entry_file2']['tmp_name'];
        $file_name3    = $_FILES['entry_file3']['name'];
        $file_tmp_name3 = $_FILES['entry_file3']['tmp_name'];
        $file_name4    = $_FILES['entry_file4']['name'];
        $file_tmp_name4 = $_FILES['entry_file4']['tmp_name'];
        move_uploaded_file($file_tmp_name, "uploads/" . $file_name);
        move_uploaded_file($file_tmp_name2, "uploads/" . $file_name2);
        move_uploaded_file($file_tmp_name3, "uploads/" . $file_name3);
        move_uploaded_file($file_tmp_name4, "uploads/" . $file_name4);
        if (isset($_FILES['entry_images']['name'])) {
            $total_files = count($_FILES['entry_images']['name']);
            for ($key = 0; $key < $total_files; $key++) {
                $countfiles = count($_FILES['entry_images']['name']);
                for ($i = 0; $i < $countfiles; $i++) {
                    $filename = $_FILES['entry_images']['name'][$i];
                    $tmp = $_FILES['entry_images']['tmp_name'][$i];
                    move_uploaded_file($tmp, "uploads/" . $filename);
                }
            }
        }
        $query = "INSERT INTO entries (
                entry_author, entry_views, entry_day, entry_day_en, entry_month, entry_month_en, entry_year, entry_upload_en, entry_excerpt, entry_excerpt_en, entry_title, entry_title_en,
                entry_content, entry_content_en, entry_file, entry_file2, entry_file3, entry_file4)
            VALUES (
                :entry_author, 0, :entry_day, :entry_day_en, :entry_month, :entry_month_en, :entry_year, :entry_upload_en, :entry_excerpt, :entry_excerpt_en, :entry_title, :entry_title_en,
                :entry_content, :entry_content_en, '$target_dir$file_name', '$target_dir$file_name2', '$target_dir$file_name3', '$target_dir$file_name4');";

        $stmt        = $this->dbh->prepare($query);
        $result      = $stmt->execute(array(
            ':entry_author' => $this->author,
            ':entry_day' => $this->day,
            ':entry_day_en' => $this->day2,
            ':entry_month' => $this->month,
            ':entry_month_en' => $this->month2,
            ':entry_year' => $this->year,
            ':entry_upload_en' => $this->upload,
            ':entry_excerpt' => $this->excerpt,
            ':entry_excerpt_en' => $this->excerpt2,
            ':entry_title' => $this->title,
            ':entry_title_en' => $this->title2,
            ':entry_content' => $this->content,
            ':entry_content_en' => $this->content2
        ));
        $this->error = $this->dbh->errorInfo();

        $query = '  SELECT entry_id
                    FROM entries
                    WHERE entry_author= :entry_author
                    ORDER BY entry_id
                    DESC LIMIT 1;';

        $stmt = $this->dbh->prepare($query);
        $stmt->execute(array(
            ':entry_author' => $this->author
        ));

        $this->error = $this->dbh->errorInfo();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['entry_id'];

        return $result;
    }

    public function SqlSelectEntryById($entry_id)
    {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT * FROM entries WHERE entry_id= :entry_id;';
        $stmt   = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_id' => $entry_id
        ));

        $this->error = $this->dbh->errorInfo();
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setByRow($entry);

        return $result;
    }

    public function SqlUpdateEntryById($entry_id)
    {
        $query = '  UPDATE entries SET
        entry_day = :entry_day,
        entry_day_en = :entry_day_en,
        entry_month = :entry_month,
        entry_month_en = :entry_month_en,
        entry_year = :entry_year,
        entry_upload_en = :entry_upload_en,
                    entry_author = :entry_author,
                    entry_views = :entry_views,
                    entry_title = :entry_title,
                    entry_title_en = :entry_title_en,
                    entry_content = :entry_content,
                    entry_content_en = :entry_content_en,
                    entry_file = :entry_file,
                    entry_file2 = :entry_file2,
                    entry_file3 = :entry_file3,
                    entry_file4 = :entry_file4,
                    entry_excerpt = :entry_excerpt,
                    entry_excerpt_en = :entry_excerpt_en
                    WHERE entry_id = :entry_id;';

        $stmt   = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_author' => $this->author,
            ':entry_views' => $this->views,
            ':entry_day' => $this->day,
            ':entry_day_en' => $this->day2,
            ':entry_month' => $this->month,
            ':entry_month_en' => $this->month2,
            ':entry_year' => $this->year,
            ':entry_upload_en' => $this->upload,
            ':entry_excerpt' => $this->excerpt,
            ':entry_excerpt_en' => $this->excerpt2,
            ':entry_title' => $this->title,
            ':entry_title_en' => $this->title2,
            ':entry_content' => $this->content,
            ':entry_content_en' => $this->content2,
            ':entry_file' => $this->file,
            ':entry_file2' => $this->file2,
            ':entry_file3' => $this->file3,
            ':entry_file4' => $this->file4

        ));

        return $result;
    }

    private function validateString()
    {

    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of date
     */
    public function getDay()
    {
        return $this->day;
    }
    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }
        /**
     * Get the value of date
     */
    public function getDayEN()
    {
        return $this->day2;
    }
    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDayEN($day2)
    {
        $this->day2 = $day2;

        return $this;
    }
    /**
     * Get the value of date1
     */
    public function getMonth()
    {
        return $this->month;
    }
    /**
     * Set the value of date1
     *
     * @return  self
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }
        /**
     * Get the value of date1
     */
    public function getMonthEN()
    {
        return $this->month2;
    }
    /**
     * Set the value of date1
     *
     * @return  self
     */
    public function setMonthEN($month2)
    {
        $this->month2 = $month2;

        return $this;
    }
    /**
     * Get the value of date2
     */
    public function getYear()
    {
        return $this->year;
    }
    /**
     * Set the value of date2
     *
     * @return  self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }
        /**
     * Get the value of date2
     */
    public function getUpload()
    {
        return $this->upload;
    }
    /**
     * Set the value of date2
     *
     * @return  self
     */
    public function setUpload($upload)
    {
        $this->upload = $upload;

        return $this;
    }
    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }
    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
        /**
     * Get the value of title
     */
    public function getTitleEN()
    {
        return $this->title2;
    }
    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitleEN($title2)
    {
        $this->title2 = $title2;

        return $this;
    }
    /**
     * Get the value of excerpt
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }
    /**
     * Set the value of excerpt
     *
     * @return  self
     */
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;

        return $this;
    }
        /**
     * Get the value of excerpt
     */
    public function getExcerptEN()
    {
        return $this->excerpt2;
    }
    /**
     * Set the value of excerpt
     *
     * @return  self
     */
    public function setExcerptEN($excerpt2)
    {
        $this->excerpt2 = $excerpt2;

        return $this;
    }
    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
        /**
     * Get the value of content
     */
    public function getContentEN()
    {
        return $this->content2;
    }
    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContentEN($content2)
    {
        $this->content2 = $content2;

        return $this;
    }
    /**
     * Get the value of content
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
    /**
     * Get the value of content
     */
    public function getFile2()
    {
        return $this2->file2;
    }
    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setFile2($file2)
    {
        $this->file2 = $file2;

        return $this;
    }
    /**
     * Get the value of content
     */
    public function getFile3()
    {
        return $this->file3;
    }
    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setFile3($file3)
    {
        $this->file3 = $file3;

        return $this;
    }
    /**
     * Get the value of content
     */
    public function getFile4()
    {
        return $this4->file4;
    }
    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setFile4($file4)
    {
        $this->file4 = $file4;

        return $this;
    }
}
?>
