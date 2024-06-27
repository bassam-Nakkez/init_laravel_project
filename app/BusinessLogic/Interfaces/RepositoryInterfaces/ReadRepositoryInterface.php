<?php
namespace App\BusinessLogic\Interfaces\RepositoryInterfaces;


interface ReadRepositoryInterface{

    public function __construct($model);

    public function getFirstModelByValue($key,$value) ;

    public function existsRecord($columnsWithValue):bool ;

    // get all record with selected column
    public function getAllBySelected(array $selected);

    public function getById($id);

    public function getAlreadyExistsFeaturesInCompany($companyId , $features);

    public function getWithRelation(array $getWhereId,array $relation) ;

    //get records by set of values
    public function getRecordsByValues( $columnName, $values) ;
    public function getRecordsByConditions( $columns , $conditions);

    public function getRecordsByCustomQuery( array | string $selectedColumn = "*"  , $conditions =[] , $with = [] , $orderBy = [] , $dateConditions = [] );

    public function getTravelsWithCompanyByFilters(
        $selectFromTravel  , $selectFromCompany ,$conditionsValues , $companies =[] ,$orderByColumns );

    public function getModelByWhere($condition);

    public function getModelsByWhere($condition) ;

    public function getModelByValue($key,$operation,$value);

    public function getUserTravel($data);

    public function getCompanyTravel($data);

    public function getSelectedWithRelation(array $selected , array $relation);

    public function getRecordsByPaginate( $columns , $conditions , $paginateNumber);
    public function getTravelsByFiltersWithExpired( $selectFromTravel  ,$conditionsValues , $expired );
    public function getDriverTravel($data);
    
}
