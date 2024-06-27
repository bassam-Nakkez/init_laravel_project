<?php
namespace App\Repository\RepositoryDepartments;

use Illuminate\Database\Eloquent\Model;
use App\BusinessLogic\Interfaces\RepositoryInterfaces\UpdateRepositoryInterface;

class UpdateRepository implements UpdateRepositoryInterface
{

    public function __construct(
        private  $model
    ){}
    // write here your update Functions :


    // update data in dataBase
    public function update($id , $newData) {
        return  $this->model->find($id)->update($newData);
    }

    
    public function updateAllRecords($new_data ) {
        return  $this->model->update($new_data );;
    }


    // update by any condition
    public function updateByConditions(array $conditions , $newData){
        $query =  $this->model::where(array_pop($conditions));
        foreach($conditions as $condition) $query->orWhere($condition);
        return $query->update($newData);

    }





}
