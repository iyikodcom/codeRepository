<?php
	//-- + veritabanındaki tablonun yapısı
	id,name,parent
	1,Yok,0
	4,k1,1
	5,k2,1
	//-- -
	
	//-- +
	$data['host'] = 'localhost';
	$data['dbname'] = 'veritabanı adı';
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
	//--veritabanında tek bir tabloda yer alan categorileri bir diziye aktarır
	function prj_buildItems($db)
	{
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
		
		return $items;
	}
	//--bir önceki fonksiyon ile oluşturulan $items dizisini kategori ağacına çevirir
	function prj_buildTree($items,$root) {

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
	//--oluşturulan kategori ağacını <select> tagında göstermek için
	function toSelect($arr, $depth, $selected = array()) 
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
				if($v['id'] == 1)
				{
					$html.= toSelect($v['childs'], $depth, $selected);
				}
				else
				{
					$html.= toSelect($v['childs'], $depth+1, $selected);
				}
			}
		}

		return $html;
	}
	//--oluşturulan kategori ağacını <table> tagında göstermek için
	function toTable($arr, $depth, $selected = array()) 
	{    
		$html = '';
		
		foreach ( $arr as $v ) 
		{
			
			if($v['id'] != 1)
			{
				$html.= '<tr>';
				$html.= '<th scope="row" class="text-center align-middle">'.$v['id'].'</th>';
				$html.= '<td class="align-middle">'.str_repeat('--', $depth);
				$html.= $v['name'].'</td>';
				$html.= '<td class="w-25">
							<div class="btn-group w-100" role="group">
								<a href="update.categories.php?i='.core_idEnCode($v['id']).'" class="btn btn-info">
									<i class="fas fa-pen"></i>
								</a>
								<a href="exec.categories.php?i='.core_idEnCode($v['id']).'&e=delete" class="btn btn-danger">
									<i class="fas fa-trash"></i>
								</a>
							</div>
						</td>';
				$html.= '</tr>'.PHP_EOL;
			}
			
			if ( array_key_exists('childs', $v) ) 
			{
				
				if($v['id'] == 1)
				{
					$html.= toTable($v['childs'], $depth, $selected);
				}
				else
				{
					$html.= toTable($v['childs'], $depth+1, $selected);
				}
				
			}
		}

		return $html;
	}
	//--seçilen bir kategorinin tüm derinliklerdeki alt kategorilerini getirir
	function allChildCat($src_arr, $currentid, $parentfound = false, $cats = array())
	{
		foreach($src_arr as $row)
		{
			if((!$parentfound && $row['id'] == $currentid) || $row['parent'] == $currentid)
			{
				$rowdata = array();
				foreach($row as $k => $v)
				{
					$rowdata[$k] = $v;
				}
					
				$cats[] = $rowdata;
				
				if($row['parent'] == $currentid)
				{
					$cats = array_merge($cats, allChildCat($src_arr, $row['id'], true));
				}
			}
		}
		return $cats;
	}
	//--bir önceki fonksiyonda gelen tüm alt kategorilerin id'lerini içeren bir dizi üretir
	function allChildCatId($array)
	{
		foreach($array as $row)
		{
			$list[] = $row['id'];
		}
		
		return $list;
	}
	//-- -

	//-- +
	$db = null;
	//-- -

?>
