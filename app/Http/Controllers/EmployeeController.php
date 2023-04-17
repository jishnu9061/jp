<?php

namespace App\Http\Controllers;
use App\DataTables\EmployeeDataTable;


class EmployeeController
{
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('employee');
    }
}
