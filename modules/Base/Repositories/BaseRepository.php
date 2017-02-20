<?php

namespace Modules\Base\Repositories;

use Dompdf\Exception;
use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Database\Query\Builder;

/**
 * Class BaseRepository
 * @package Modules\Base\Repositories
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
abstract class BaseRepository extends Repository implements RepositoryInterface
{
    protected $table;

    /**
     * Boot de inicialização da classe
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->table = $this->getTable();
    }

    /**
     * Get model name
     * @return string
     */
    public function getModel()
    {
        return $this->model();
    }

    /**
     * Get object model
     * @return string
     */
    public function getObjModel()
    {
        return $this->model;
    }

    /**
     * Get table name
     * @return string
     */
    public function getTable()
    {
        return $this->model->getTable();
    }

    /**
     * Apply search's criteria
     * @param $request
     * @return $this
     */
    protected function applyCriteriaRequest($request)
    {
        foreach ($request as $field => $value) {
            if($value){
                foreach ($this->fieldSearchable as $key => $fieldOrCondition){
                    if(is_numeric($key)){
                        if($fieldOrCondition == $field){
                            $this->doCriteria($field, '=', $value);
                        }
                    } else{
                        if($key == $field){
                            $this->doCriteria($field, $fieldOrCondition, $value);
                        }
                    }
                }
            }
        }
        return $this;
    }

    /**
     * Execute search's criteria
     * @param $field
     * @param $condition
     * @param $value
     * @return $this
     */
    protected function doCriteria($field, $condition, $value)
    {
        $arrayValues = explode('+', $value);
        $flag = true;
        $field = $this->table.".".$field;

        if (is_array($arrayValues)){
            foreach($arrayValues as $val) {
                if($val){
                    $val = ($condition == 'like') ? "%$val%" : $val;
                    if($flag){
                        $this->model = $this->model->where($field, $condition, $val);
                        $flag = false;
                    } else{
                        $this->model = $this->model->orWhere($field, $condition, $val);
                    }
                }
            }
        } else{
            if($value){
                $value = ($condition == 'like') ? "%$value%" : $value;
                $this->model = $this->model->where($field, $condition, $value);
            }
        }
        return $this;
    }
}