<?php
	//-- +
	id,name,parent
	1,Yok,0
	4,k1,1
	5,k2,1
	//-- -
	
	//-- +
	$data['host'] = 'localhost';
	$data['dbname'] = 'ecommerce';
	$data['uName'] = 'root';
	$data['uPass'] = '';
	//-- -
	
	//-- +
	try
	{
		$db = new PDO("mysql:host=".$data['host'].";dbname=".$data['dbname'].";charset=utf8","".$data['uName']."","".$data['uPass']."");
	
	} 
	catch(PDOException $e)
	{
		
		print $e->getMessage();
		
	}
	//-- -
	
	//-- +
	
	$query = $db->prepare('SELECT ecom_categories.id,ecom_categories.name,ecom_categories.parent FROM ecom_categories ORDER BY ecom_categories.name ASC');
	$query->execute();

	$items = array();
	if($query->rowCount() > 0)
	{
		while($row = $query->fetch(PDO::FETCH_ASSOC))
		{
			$items[] = $row;
		}
	}
	
	function buildTree($items,$root) {

		$childs = array();

		foreach($items as &$item)
		{
			$childs[$item['parent']][] = &$item;
			unset($item);
		}

		foreach($items as &$item)
		{
			if(isset($childs[$item['id']]))
			{
				$item['childs'] = $childs[$item['id']];
			}
			else
			{
				$item['childs'] = array();
			}
		}

		return $childs[$root];
	}

	$tree = buildTree($items,1);
	
	echo '<pre>';
	print_r($tree);
	echo '</pre>';
	//-- -
	
	//-- +
	function abc($data,$depth = 0)
	{
		$list = array();
		
		foreach($data as $row1)
		{
			foreach($data as $row2)
			{
				if($row1['parent'] == $row2['id'])
				{
					$list[$row1['id']]['id'] = $row1['id'];
					$list[$row1['id']]['name'] = $row1['name'];
					$list[$row1['id']]['parent_name'] = $row2['name'];
				}
			}
		}
		
		return $list;
	}
	
	echo '<pre>';
	print_r(abc($items));
	echo '</pre>';
	//-- -
	
	//-- +
	function toSelect ($arr, $depth, $selected) 
	{    
		$html = '';
		
		foreach ( $arr as $v ) 
		{
			if(in_array($v['id'],$selected))
			{
				$html.= '<option value="' . $v['id'] . '" selected>';
				$html.= str_repeat('--', $depth);
				$html.= $v['name'] . '</option>' . PHP_EOL;
			}
			else
			{
				$html.= '<option value="' . $v['id'] . '">';
				$html.= str_repeat('--', $depth);
				$html.= $v['name'] . '</option>' . PHP_EOL;
			}

			if ( array_key_exists('childs', $v) ) 
			{
				
				$html.= toSelect($v['childs'], $depth+1, $selected);
				
			}
		}

		return $html;
	}

	echo '<select multiple>';
	echo toSelect($tree,0,array(4,12));
	echo '</select>';
	//-- -
	
	
	//-- +
	$db = null;
	//-- -

?>
