<?php
			@$con=mysqli_connect("localhost", "root", "");
            mysqli_select_db($con, "abbas_portfolio");
			$s = mysqli_query($con, "SELECT * FROM tbl_blog");
			if($s === FALSE) { 
                die(mysqli_error($con)); 
			}

			while ($r = mysqli_fetch_array($s)) 
		    {
                // $info[$j][0] = $r['date'];
                // $info[$j][1] = $r['title'];
                // $info[$j][2] = $r['content'];
                $data[] = array('date' => $r['date'], 'title' => $r['title'], 'content' => $r['content']);
            }

            $date  = array_column($data, 'date');
            $title = array_column($data, 'title');
            $content = array_column($data, 'content');

            array_multisort($date, SORT_DESC, $title, SORT_ASC, $content, SORT_ASC, $data);

            echo $data[0]['date'] . "<br>";
            echo $data[1]['date'] . "<br>";
?>