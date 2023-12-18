<?php

function show_status() 
{
	global $mysqli;
	
	$sql = 'SELECT * FROM game_status';
	$st = $mysqli->prepare($sql);
	
	$st->execute();
	$res = $st->get_result();
	
	header('Content-type: application/json');
	print json_encode($res->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
}

function update_game_status()
{
	global $mysqli;
	
	$sql = 'SELECT * FROM game_status';
	$st = $mysqli->prepare($sql);
	
	$st->execute();
	$res = $st->get_result();
	$status = $res->fetch_assoc();
	
	$new_status=null;
	$new_turn=null;
	
	$sql3 = 'SELECT COUNT(*) AS aborted FROM players WHERE last_action< (NOW() - INTERVAL 5 MINUTE)';
	$st3=$mysqli->prepare($sql3);
	$st3->execute();
	$res3 = $st3->get_result();
	$aborted = $res3->fetch_assoc()['aborted'];
	if($aborted>0)
	{
		$sql2 = 'UPDATE players SET username=NULL, token=NULL WHERE last_action< (NOW() - INTERVAL 5 MINUTE)';
		$st2 = $mysqli->prepare($sql2);
		$st2->execute();
		if($status['status']=='piece_positioning')
		{
			$new_status='aborted';
		}
		else if($status['status']=='started')
		{
			$new_status='aborted';
		}
	}
	
	$sql4 = 'SELECT COUNT(*) AS c FROM players WHERE username IS NOT NULL';
	$st4 = $mysqli->prepare($sql4);
	$st4->execute();
	$res4 = $st4->get_result();
	$active_players = $res4->fetch_assoc()['c'];
	
	
	switch($active_players)
	{
		case 0: $new_status='not_active';
			break;
		case 1: $new_status='initialized';
			break;
		case 2: $new_status='piece_positioning';
			if($status['p_turn']==null)
			{
				$new_turn='B';
			}
			break;
	}
	
	$sql5 = 'SELECT COUNT(*) AS p FROM board WHERE piece IS NOT NULL';
	$st5 = $mysqli->prepare($sql5);
	$st5->execute();
	$res5 = $st5->get_result();
	$pieces_placed = $res5->fetch_assoc()['p'];
	
	if($pieces_placed == 80)
	{
		$new_status='started';
		if($status['p_turn']==null)
		{
			$new_turn='B';
		}
	}
		
	
	$sql6 = 'UPDATE game_status SET status=?, p_turn=?';
	$st6 = $mysqli->prepare($sql6);
	$st6->bind_param('ss',$new_status,$new_turn);
	$st6->execute();
	
}

?>