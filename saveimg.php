<?PHP
    session_start();

    if($_SESSION['auth'])
    {
        if (!file_exists("./img/photos"))
            mkdir ("./img/photos");
        $str = $_POST['filter'];
        $str1 = str_replace('http://localhost:8080/camagru/img/filters/', '', $str);
        // $str = str_replace('http://localhost:8080/camagru/img/filters/', '', $str);
        $filter = "./img/filters/" . $str1;
        // echo $filter;
        $img = $_POST['data'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $filedata = base64_decode($img);
        $filepath = "./img/photos/";
        $filesql = time() . '.png';
        $filename = $filepath . $filesql;
        file_put_contents($filename, $filedata);

        if (file_exists($filter))
		{
            // $filter_top = $_POST['top'];
            // $filter_left = $_POST['left'];
			$dest = imagecreatefrompng($filename);
			$cover = imagecreatefrompng($filter);
			$cover = imagescale($cover, imagesx($dest));
            imagecopymerge($dest, $cover, 10, 9, 0, 0, 181, 180, 100);
            imagepng($dest, $filename);
		}
        try
		{
            $conn = new PDO("mysql:host=localhost;dbname=db_camagru", "root", "150291");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$req = $conn->prepare('INSERT INTO img (base_64, url, user_id, dates) VALUES (:base, :url, :userID, NOW())');
			$req->execute(array(
                ':base' => $img,
				':url' => $filename,
				':userID' => $_SESSION['auth']['id']
			));
		}
		catch(PDOException $e)
		{
            echo "Couldn't write in Database: " . $e->getMessage();
        }
        echo $filename;
    }
?>