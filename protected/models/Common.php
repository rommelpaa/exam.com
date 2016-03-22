<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\YiiMailer;


class Common extends Model
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return static the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getDataList($tablename='', $filter='')
	{
		$qry	 	= "SELECT * FROM ".$tablename." ".$filter;		
		$command 	= Yii::$app->db->createCommand($qry)->queryAll();
		return $command;
	}
	
	public function saveDataList($tablename='', $save=array())
	{
		if(!empty($save))
		{
			$dbFields	= '';
			$dbValues	= '';
			
			foreach($save as $field => $row)
			{
				
				$dbFields		= '(';
				foreach($row as $field => $values)
				{				
					$dbFields		.= '`'.$field.'`, ';
				}
				$dbFields 		 = rtrim($dbFields,', ');
				$dbFields		.= ')';
				break;
			}
			
			
			foreach($save as $field => $row)
			{
				
				$dbValues		.= '(';
				foreach($row as $field => $values)
				{				
					$dbValues		.= "'".$values."'".', ';
				}
				$dbValues 		= rtrim($dbValues,', ');
				$dbValues		.= '), ';
			}
			
			$dbValues 		= rtrim($dbValues,', ');
			$qry	 	= "INSERT INTO $tablename $dbFields VALUES $dbValues";	
			$command 	= Yii::$app->db->createCommand($qry)->execute();
			return $command;
		}else
		{
			return false;
		}	
	}	
	
	public function updateDataList($tablename, $filter=array(), $where=array())
	{
		
		if(!empty($filter))
		{
			$dbWhere	= '';
			$dbValues	= '';

			foreach($filter as $row)
			{
				foreach($row as $fields => $updates)
				{
					$dbValues	.= '`'.$fields.'` = '."'".$updates."'".', ';
				}
				$dbValues		= rtrim($dbValues, ', ');
			}
			
			foreach($where as $row)
			{
	
				foreach($row as $fields => $values)
				{
					$dbWhere	.= '`'.$fields.'` = '."'".$values."'".' AND ';
				}
				$dbWhere		= rtrim($dbWhere, 'AND ');
				
			}
					
			
					
			$qry	 	= "UPDATE $tablename SET $dbValues WHERE $dbWhere";	
			$command 	= Yii::$app->db->createCommand($qry)->execute();
			return $command;
		}else
		{
			return false;
		}
	}
	public function deleteQuery($tblename='', $filter)
	{
		$qry		= "DELETE FROM $tblename WHERE $filter";
		$command 	= Yii::$app->db->createCommand($qry)->execute();
		return $command;
	}
	
	public function truncateQuery($tablename = '')
	{
		$qry		= "TRUNCATE $tablename";
		
		$command 	= Yii::$app->db->createCommand($qry)->execute();
		return $command;
	}
	
	public function executeQuery($qry='')
	{
		$command 	= Yii::$app->db->createCommand($qry);
		return $command;
	}

	public function getCandidacy($candidacy_id=0)
	{
		if($candidacy_id>0)
		{
			$tablename   = 'candidacy';
			$filter      = "WHERE candidacy_id=$candidacy_id";
			$results     = $this->getDataList($tablename, $filter);
			if(!empty($results))
			{
				return $results[0]['candidacy_name'];
			}
			
		}
	}

	public function getUpdateStocks($product_id=0, $qty=0)
	{

		$tablename        = "products";
		$filter           = "WHERE product_id=$product_id";
		$results          = $this->getDataList($tablename, $filter);
		
		$update_rs        = false;
		if(!empty($results))
		{
			$dbqty        = $results[0]['qty'];
			$qty          = $dbqty - $qty;
			
			$update[0]      = array(
								"qty"	=> $qty
							);
			$where[0]		= array("product_id"	=> $product_id);
			$update_rs      = $this->updateDataList($tablename, $update, $where);
		}
		return $update_rs;
	}
}

?>