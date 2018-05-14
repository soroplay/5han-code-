<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;

class CostsController extends AppController{
	public function initialize(){
		$this->viewBuilder()->layout("Costs");
	}
	
    public function index(){
		$this->set('entity', $this->Costs->newEntity());
		date_default_timezone_set('Asia/Tokyo');
		$start = date("Y-m-01");
		$end = date("Y-m-t");

        $data = $this->Costs->find('all',
			['conditions'=>['costdate BETWEEN "' . $start  . '" AND "' . $end . '"']]);
        $this->set('data', $data);

		$sum = 0;
		foreach($data as $obj){
			$sum += $obj->value;
		}
		$remain = 50000 - $sum;
		$this->set('remain', $remain);

		$today = date("Y-m-d");
		$interval_day = $this->day_diff($today, $end);

		$dayValue = $remain / $interval_day;
		$imageName = "";
		if($dayValue >= 3000){
			$imageName = "good.png";
		}else if($dayValue >= 1500){
			$imageName = "normal.png";
		}else if($dayValue >= 500){
			$imageName = "bad.png";
		}else{
			$imageName = "verybad.png";
		}
		$this->set('imageName', $imageName);
    }

    public function input(){
		$entity = $this->Costs->newEntity();
		$this->set('entity',$entity);
    }

    public function addRecord(){
        if($this->request->is('post')){
            $data = array(
                'costdate'=>h($this->request->data['costdate']),
                'usedetail'=>h($this->request->data['usedetail']),
                'value'=>h($this->request->data['value'])
            );
            $this->Costs->save($this->Costs->newEntity($data));
        }
		$this->set('costdate', isset($data) ? $data['costdate'] : null);
		$this->set('usedetail', isset($data) ? $data['usedetail'] : null);
		$this->set('value', isset($data) ? $data['value'] : null);
    }

	public function delRecord($id){
        if($id != null){
            try{
                $entity = $this->Costs->get($id);
                $this->Costs->delete($entity);
            }catch(Exception $e){
                Log::write('debug', $e->getMessage());
            }
        }
        return $this->redirect(['action' => 'index']);
	}

    function day_diff($date1, $date2) {
	    // 日付をUNIXタイムスタンプに変換
	    $timestamp1 = strtotime($date1);
	    $timestamp2 = strtotime($date2);
	 
	    // 何秒離れているかを計算
	    $seconddiff = abs($timestamp2 - $timestamp1);
	 
	    // 日数に変換
	    $daydiff = $seconddiff / (60 * 60 * 24);
	 
	    // 戻り値
	    return $daydiff;
    }
}