<?php
	session_start();
	//require_one dan include hampir sama
	//kalau require jika error dia akan di tampilkan pesan errornya
	require_once 'dbconfig.php';

	if(isset($_POST['btn-login']))
	{
		$username = trim($_POST['username']); //fungsi pada trim menghilangkan spasi
		$user_password = trim($_POST['password']); // menghilangkan spasi yg di maksud,jika di user dan password qta ketik kan spasi,maka spasi tidak dibaca
		$password = $user_password;

		try {
			$stmt = $db_con->prepare("SELECT * FROM dosen WHERE username=:username");
			$stmt->execute(array(":username"=>$username));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			$stmt2 = $db_con->prepare("SELECT * FROM mahasiswa WHERE username=:username");
			$stmt2->execute(array(":username"=>$username));
			$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
			$count2 = $stmt2->rowCount();
			
			$stmt3 = $db_con->prepare("SELECT * FROM admin_prodi WHERE username=:username");
			$stmt3->execute(array(":username"=>$username));
			$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
			$count3 = $stmt3->rowCount();
			
			$stmt4 = $db_con->prepare("SELECT * FROM kaprodi WHERE username=:username");
			$stmt4->execute(array(":username"=>$username));
			$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
			$count4 = $stmt4->rowCount();
			
			if($row['password']==$password){
				echo "ok";
				$_SESSION['user_session'] = $row['id_dosen'];			
				$_SESSION['user_level'] = $row['status_user'];			
			}
			elseif($row2['password']==$password){
				echo "ok";
				$_SESSION['user_session'] = $row2['nim'];			
				$_SESSION['user_level'] = $row2['status_user'];			
			}
			elseif($row3['password']==$password){
				echo "ok";
				$_SESSION['user_session'] = $row3['id_admin'];			
				$_SESSION['user_level'] = $row3['status_user'];			
			}
			elseif($row4['password']==$password){
				echo "ok";
				$_SESSION['user_session'] = $row4['id_kaprodi'];			
				$_SESSION['user_level'] = $row4['status_user'];			
			}
			else{
				echo "Maaf,Harap Periksa Username & Password Anda";
			}
		} 
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

?>