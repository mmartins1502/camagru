<?PHP
    session_start();

    if($_SESSION['auth'])
    {
        if (!file_exists("./img/photos"))
            mkdir ("./img/photos");
        $filter = "./img/filters/" . $_POST['filter'] . ".png";
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
			$dest = imagecreatefromstring($filedata);
			$src = imagecreatefrompng($filter);
			$src = imagescale($src, imagesx($dest) * 0.5);
			imagecopy($dest, $src, 0, 0, 0, 0, imagesx($src) - 1, imagesy($src) - 1);
			imagepng($dest, $filename);
		}
        try
		{
			$conn = new PDO("mysql:host=localhost;dbname=db_camagru", "root", "150291");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$req = $conn->prepare('INSERT INTO img (base_64, url, user_id, dates) VALUES (:base, :url, :userID, NOW())');
			$req->execute(array(
                ':base' => $img,
				':url' => $filesql,
				':userID' => $_SESSION['auth']['id']
			));
		}
		catch(PDOException $e)
		{
			echo "Couldn't write in Database: " . $e->getMessage();
        }
        // echo $filename;
    }
?>