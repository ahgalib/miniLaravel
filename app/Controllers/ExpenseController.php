<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';

use Model\User;
use Core\Request;
use App\Models\Expense;
use App\Validator\Validator;

require_once __DIR__ . '/../Core/Database.php';

class ExpenseController{



    public function index(Request $request){
        echo "This is the index method of ExpenseController";
        die;
        // echo "This is the index method of ExpenseController";
        // die;
        return view('expense/index');
    }
    public function dashboard(){
        return view('expense/dashboard');
    }

    public function showExpense(){
        $expense = new Expense();
        $expense_data = $expense->all('add_expense');
        // $expense_data = $expense->find('add_expense', 2);
        //$expense_data = $expense->select('add_expense', ['id', 'category_id', 'amount', 'date']);
        // echo "<pre>";
        // print_r($expense_data);
        // die;
        return view('expense/show-expense',['expense_data' => $expense_data]);
    }

    public function expense(){
       
        return view('expense/add-expense');
    }

    //create user expense
    public function addExpense(){
       
        $expenseModel = new Expense();

        $validation = new Validator();

        $data = [
            'category_id' => 2, // Hardcoded for now
            'amount' => $_POST['amount'],
            'date' => $_POST['date'],
            'notes' => $_POST['notes'],
            'is_recurring' => '0',
            'frequency' => $_POST['frequency'],
        ];
        // $is_recurring = false;
        // if(empty($is_recurring)){
        //     echo "boolean value is empty";
        //     die;
        // }
        //validate the data
        if(!$validation->validatior($data, [
            'category_id' => 'required',
            'amount' => 'required',
            'date' => 'required|date',
            'notes' => 'nullable|string',
            'is_recurring' => 'required|boolean',
            'frequency' => 'nullable|string',
        ])){
            $errors = $validation->errors;
            // Handle errors (e.g., store in session, display to user, etc.)
            print_r($errors); // For debugging; replace with your error handling.
            return;
        };

        // if (!$validation->validatior($data, $rules)) {
        //     $errors = $validator->errors();
        //     // Handle errors (e.g., store in session, display to user, etc.)
        //     print_r($errors); // For debugging; replace with your error handling.
        //     return;
        // }
        $expenseModel->create('add_expense',
            $data

        );

        header("Location: /financebuddy/show-expense");
        
    }

    // Show the edit form with current expense details
    public function editExpense($id)
    {
        $expenseModel = new Expense();
        $expense = $expenseModel->find('add_expense', $id);

        if (!$expense) {
            die('Expense not found.');
        }

        return view('expense/edit-expense', ['expense' => $expense]);
    }

    // Update the expense
    public function updateExpense($id)
    {
        // echo $id;die;
        $expenseModel = new Expense();
        $validation = new Validator();

        $data = [
            'category_id' => $_POST['category_id'],
            'amount' => $_POST['amount'],
            'date' => $_POST['date'],
            'notes' => $_POST['notes'],
            'is_recurring' => isset($_POST['is_recurring']) ? 1 : 0,
            'frequency' => $_POST['frequency'] ?? null,
        ];

        // Validate input data
        if (!$validation->validatior($data, [
            'category_id' => 'required',
            'amount' => 'required',
            'date' => 'required|date',
            'notes' => 'nullable|string',
            'is_recurring' => 'boolean',
            'frequency' => 'nullable|string',
        ])) {
            $errors = $validation->errors;
            print_r($errors); // Handle validation errors properly.
            return;
        }

        // Update expense in the database
        $updated = $expenseModel->update('add_expense', $data, $id);

        if ($updated) {
            header("Location: /financebuddy/show-expense");
        } else {
            die('Failed to update expense.');
        }
    }
    


}