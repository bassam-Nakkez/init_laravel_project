<?php
namespace App\Repository\RepositoryDepartments;

use Carbon\Carbon;
use App\Http\Models\Station;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\ReadRepositoryInterface;

class ReadRepository implements ReadRepositoryInterface
 {

    public function __construct(private $model){}

    public function getFirstModelByValue($key,$value) {
        $recorded = $this->model->where($key,'=',$value)->first();
        return $recorded? $recorded : null;
    }

    public function getModelByValue($key,$operation,$value) {
        $recorded = $this->model->where($key,$operation,$value)->first();
        return $recorded? $recorded : null;
    }

    public function getModelByWhere($condition) {
        $recorded = $this->model->where($condition)->first();
        return $recorded? $recorded : null;
    }

    public function getModelsByWhere($condition) {
        $recorded = $this->model->where($condition)->get();
        return $recorded? $recorded : null;
    }

    // check if record is exists in dataBase
    public function existsRecord($columnsWithValue):bool{
        return $this->model->where($columnsWithValue)->exists();
    }

    // get all record with selected column
    public function getAllBySelected(array $selected){
        return $this->model->select($selected)->get();
    }



    public function getById($id) {
        return $this->model->findOrFail($id);
    }


    // search travel
    public function getTravelsWithCompanyByFilters(
        $selectFromTravel  , $selectFromCompany ,$conditionsValues , $companies = [] ,$orderByColumns )
        {
            $query = $this->model->select($selectFromTravel)->where('from','like',$conditionsValues['from'])
            ->where('to','like',$conditionsValues['to'])->whereDate('travelDate',$conditionsValues['travelDate']);

            if($companies != null ){
                $query->whereIn('companyId', $companies);
            }

            if(isset($conditionsValues['isVIP'])) $query->where('isVIP',$conditionsValues['isVIP']);

            if(isset($conditionsValues['stationId'])){
                $id = $conditionsValues['stationId'];

                if( Station::select('seriesId')->where('stationId',$id)->exists())
                {
                    $subQuery = Station::select('seriesId')->where('stationId',$id)->get();

                }
                else {  $subQuery = [0]; }
                $query->whereIn('seriesId',$subQuery);
            }

        $query->with(['company' => function ($q) {
            $q->select('companyId', 'name' , 'logo');
        }]);

        if(isset($orderByColumns['price'])) $query->orderBy('price');
        $query->orderBy('recommendation', 'desc');
        return $query->get();
        }


        public function getWithRelation(array $getWhereId , array $relation) {
            return $this->model->select()->where($getWhereId)->with($relation)->get();
        }

        public function getSelectedWithRelation(array $selected , array $relation) {
            return $this->model->select($selected)->with($relation)->get();
        }


    // build your custom query
        public function getRecordsByCustomQuery( array | string $selectedColumn = "*" , $conditions =[] , $with = [] , $orderBy = [] ,  $dateConditions =[]){

        $query = $this->model->select($selectedColumn);

        foreach ($conditions as $condition) {
          $query->where($condition[0],$condition[1],$condition[2]);
        }

        foreach ($dateConditions as $condition) {
            $query->whereDate($condition[0],$condition[1],$condition[2]);
          }

        foreach($with as $entity) {
            $query->with($entity);
        }

        foreach($orderBy as $order){
            $query->orderby($order[0],$order[1]);
        }

        $result = $query->get();

        return $result->isNotEmpty() ? $result : null;
    }

    //get records by set of values
    public function getRecordsByValues( $columnName, $values) {
            $records = $this->model::whereIn($columnName,$values)->get();
            return $records? $records : null;
    }

    public function getRecordsByConditions( $columns , $conditions) {
        $records = $this->model::select( $columns )->where($conditions)->get();
        return $records? $records : null;
}

public function getRecordsByPaginate( $columns , $conditions , $paginateNumber) {
    $records = $this->model::select( $columns )->where($conditions)->paginate($paginateNumber);
    return $records? $records : null;
}



    public function getAlreadyExistsFeaturesInCompany($companyId , $features){
        $query = $this->model->where('companyId',$companyId)
        ->where('feature','like',$features[0]);
        unset($features[0]);
            foreach($features as $feature)
                $query->orWhere( 'feature','like',$feature);
       return $query->get();
    }

    public function getUserTravel($data){
        return $this->model->whereHas(
            'reservation' ,function($q) use ($data){
                $q->where("userId","=",$data['userId']);
            }
        )->where("travelDate",$data['operation'],$data['travelDate'])->with('company')->get();
    }

    public function getCompanyTravel($data){
        return $this->model->where('travelDate',">=",$data['date'])->where("companyId","=",$data['companyId'])->with('company')->get();
    }


     
    // View travels in Company 
    public function getTravelsByFiltersWithExpired(
        $selectFromTravel  ,$conditionsValues , $expired )
        {
            $query = $this->model->select($selectFromTravel)->where('companyId', $conditionsValues['companyId'] )
            ->where('from','like',$conditionsValues['from'])
            ->where('to','like',$conditionsValues['to']);
            $today = Carbon::today();
            $now = Carbon::now();


            if (($expired && $today->gt($conditionsValues['travelDate'])) || ( !$expired && $today->lt($conditionsValues['travelDate']) ) ) 
            {
                $query->whereDate('travelDate',$conditionsValues['travelDate']);
            }
            elseif(!$expired && $conditionsValues['travelDate'] === date('Y-m-d') )
            {
                $query->whereDate('travelDate',$conditionsValues['travelDate'])
                ->where('timeToLeave', '>', $now );
            }
            elseif( $expired && $conditionsValues['travelDate'] === date('Y-m-d'))
            {
                $query->whereDate('travelDate',$conditionsValues['travelDate'])
                ->where('timeToLeave', '<',  $now );
            }


            if(isset($conditionsValues['isVIP'])) $query->where('isVIP',$conditionsValues['isVIP']);

            if(isset($conditionsValues['stationId'])){
                $id = $conditionsValues['stationId'];

                if( Station::select('seriesId')->where('stationId',$id)->exists())
                {
                    $subQuery = Station::select('seriesId')->where('stationId',$id)->get();

                }
                else {  $subQuery = [0]; }
                $query->whereIn('seriesId',$subQuery);
            }
        // if(isset($orderByColumns['price'])) $query->orderBy('price');
        // $query->orderBy('recommendation', 'desc');
        return $query->get();
        }
}
