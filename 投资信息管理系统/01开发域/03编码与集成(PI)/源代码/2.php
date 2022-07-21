<?php 
namespace App\Controllers\Fire;
use App\Controllers\BaseController;
use App\Services\Device\FireService;

/*
	电气火灾控制器
*/
class FireController extends BaseController
{
	use \CodeIgniter\API\ResponseTrait;
	/**
     * 气体监测
     * @param  int $projectId 项目id
     * @param  int $divisionId 分部列表
     * @param  string  $placeUniqueId 配电室id
     */
	function gasDetectionInfo(int $projectId = 0,int $divisionId = 0,string $placeUniqueId = '' )
	{
		$result = [];
		if ($projectId != 0 && $divisionId != 0) 
		{
			$gasdetection = new FireService();
        	$result = $gasdetection->gasDetectionInfo($projectId,$divisionId,$placeUniqueId);
        	return $this->respond($result);
		}else{
			return $this->failValidationError('请求参数错误');  
		}
	}

	/**
     * 电气火灾
     * @param  int $projectId 项目id
     * @param  int $divisionId 分部列表
     * @param  string  $placeUniqueId 配电室id
     */
	function electricalFireInfo(int $projectId = 0,int $divisionId = 0,string $placeUniqueId = '' )
	{
		$result = [];
		if ($projectId != 0 && $divisionId != 0) 
		{
			$electricalfireInfo = new FireService();
        	$result = $electricalfireInfo->electricalFireInfo($projectId,$divisionId,$placeUniqueId);
        	return $this->respond($result);
		}else{
			return $this->failValidationError('请求参数错误');  
		}
	}
}
 ?>
